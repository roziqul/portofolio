<?php
namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Reserved;
use App\Models\Serial;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class reservedController extends Controller
{
    public function inputNisn()
    {
        return view('reserved.search-student');
    }

    public function searchNisn(Request $request)
    {
        $carbon = Carbon::now();
        $now = $carbon->toDateString();

        $nisn = $request->nisn;
        $checkData = Student::where('nisn', $nisn)->first();
        
        if ($checkData == null) {

            return Redirect::back()->withErrors(['msg' => 'NISN Tidak Terdaftar']);

        } else {
            $studentEmail = $checkData->email;
            $checkAccount = User::where('email', $studentEmail)->first();

            if ($checkAccount == null) {

                return Redirect::back()->withErrors(['msg' => 'Siswa belum aktivasi akun']);

            } else {
                
                $studentId = $checkData->id;
                $included = ['catalog.category','catalog.section'];

                $reserved = Reserved::with($included)->where('student_id', $studentId)->where('start_date', $now)->get();
                $rsvcount = Reserved::with($included)->where('student_id', $studentId)->where('start_date', $now)->count();
                
                Session::put('student', $checkData);

                $data = [
                    'catalog' => null,
                    'student' => $checkData,
                    'reserved' => $reserved,
                    'rsvcount' => $rsvcount,
                ];

                return view('reserved.main-process', $data);
            }
        }
    }
    
    public function outputNisn()
    {
        $carbon = Carbon::now();
        $now = $carbon->toDateString();

        $student = Session::get('student');

        $studentId = $student->id;
        $included = ['serial','serial.catalog'];
        $reserved = Reserved::with($included)->where('student_id', $studentId)->where('start_date', $now)->get();
        $rsvcount = Reserved::with($included)->where('student_id', $studentId)->where('start_date', $now)->count();

        $data = [
            'catalog' => null,
            'student' => $student,
            'reserved' => $reserved,
            'rsvcount' => $rsvcount
        ];

        return view('reserved.main-process', $data);
    }

    public function searchCatalog(Request $request)
    {
        $carbon = Carbon::now();
        $now = $carbon->toDateString();

        $student = Session::get('student');

        $studentId = $student->id;
        $included = ['serial','serial.catalog'];
        $reserved = Reserved::with($included)->where('student_id', $studentId)->where('start_date', $now)->get();
        $rsvcount = Reserved::with($included)->where('student_id', $studentId)->where('start_date', $now)->count();

        $inputSerial = $request->serial_number;
        $checkSerial = Serial::where('serial_number', $inputSerial)->first();

        if ($checkSerial == null) {

            $data = [
                'catalog' => null,
                'student' => $student,
                'reserved' => $reserved,
                'rsvcount' => $rsvcount
            ];

            return view('reserved.main-process', $data);

        } else {

            $catalogStatus = $checkSerial->status;
            $included = ['catalog.category','catalog.section','catalog'];

            $catalog = Serial::with($included)->where('serial_number', $inputSerial)->first();

            $data = [
                'catalog' => $catalog,
                'student' => $student,
                'reserved' => $reserved,
                'catalogStatus' => $catalogStatus,
                'rsvcount' => $rsvcount,
            ];

            return view('reserved.main-process', $data);

        } 
    }

    public function submitReserved(Request $request)
    {
        $carbon = Carbon::now();
        $now = $carbon->toDateString();

        $condition = $request->condition;
        $serial = $request->serial_number;

        $serial = Serial::where('serial_number', $serial)->first();
        $serialId = $serial->id;

        if ($condition == 'returned') {

            $updateReserved = Reserved::where('serial_id', $serialId)->update(
                [
                    'rsv_status' => 'finished',
                    'return_date' => $now
                ]
            );

            $updateSerial = Serial::where('id', $serialId)->update(
                [
                    'status' => 'available',
                    'student_id' => null
                ]
            );  

            return redirect()->route('admin-reserved-search-reserved');

        } elseif ($condition == 'lended') {

            $auth = auth()->user()->id;
            $duration = $request->duration;

            $carbonNow = Carbon::now();
            $carbonDue = Carbon::now()->addMonths($duration);

            $now = $carbonNow->toDateString();
            $due = $carbonDue->toDateString();

            $email = $request->email;
            $student = Student::where('email', $email)->first();
            $studentId = $student->id;

            $nRsv = new Reserved();

            $nRsv['serial_id'] = $serialId;
            $nRsv['student_id'] = $studentId;
            $nRsv['start_date'] = $now;
            $nRsv['duration'] = $duration;
            $nRsv['due_date'] = $due;
            $nRsv['verified_by'] = $auth;

            if ($nRsv->save()) {

                $updateSerial = Serial::where('id', $serialId)->update(
                    [
                        'status' => 'not_available',
                        'student_id' => $studentId,
                    ]
                );

            }

            return redirect()->route('admin-reserved-student-detail');

        }
    }

    public function cancelReserved(Request $request)
    {
        $carbon = Carbon::now();
        $now = $carbon->toDateString();

        $reservedId = $request->reserved_id;
        $serialId = $request->serial_id;

        $cancelReserved = Reserved::where('id', $reservedId)->delete();

        $updateSerial = Serial::where('id', $serialId)->update(
            [
                'status' => 'available',
                'student_id' => null
            ]
        );  

        $student = Session::get('student');

        $studentId = $student->id;
        $included = ['serial','serial.catalog'];
        $reserved = Reserved::with($included)->where('student_id', $studentId)->where('start_date', $now)->get();
        $rsvcount = Reserved::with($included)->where('student_id', $studentId)->where('start_date', $now)->count();

        $data = [
            'catalog' => null,
            'student' => $student,
            'reserved' => $reserved,
            'rsvcount' => $rsvcount
        ];

        return view('reserved.main-process', $data);
    }

    public function searchReserved()
    {
        return view('reserved.search-reserved');
    }

    public function resultReserved(Request $request)
    {
        $included = ['catalog','catalog.section','catalog.category','student'];
        $included2 = ['student','serial'];

        $getSerial = $request->serial_number;

        $serial = Serial::with($included)->where('serial_number', $getSerial)->first();
        $serialId = $serial->id;

        $reserved = Reserved::with($included2)->where('serial_id', $serialId)->first();

        $data = [
            'serial' => $serial,
            'reserved' => $reserved
        ];

        return view('reserved.result-reserved', $data);
    }
}
