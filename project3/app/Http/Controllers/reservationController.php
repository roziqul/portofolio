<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Catalog;
use App\Models\Reservation;
use App\Models\Reserved;
use App\Models\Serial;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class reservationController extends Controller
{
    public function index()
    {
        $selected = ['student_id', 'status'];
        $reservation = Reservation::with('student')->select($selected)->where('status', 'waiting')->distinct('student_id')->get();

        $data = [
            'no' => 1,
            'reservation' => $reservation,
        ];

        return view('reservation.index', $data);
    }

    public function indexbyUser()
    {
        $isWaiting = ['status', 'waiting'];

        $nisn = auth()->user()->nisn;
        $studentId = Student::where('nisn', $nisn)->get('id');

        $reservation = Reservation::with('student')->where($isWaiting)->where('student_id', $studentId)->get();

        $data = [
            'no' => 1,
            'reservation' => $reservation,
        ];

        return view('reservation.index', $data);
    }

    public function show(Request $request)
    {
        $studentId = $request->id;
        $reservationIncluded = ['catalog','catalog.section','catalog.category'];

        $student = Student::where('id', $studentId)->first();
        $reservation = Reservation::with($reservationIncluded)->where('student_id', $studentId)->where('status', 'waiting')->get();
        $reserved = Reserved::with('catalog.section')->with('catalog.category')->where('student_id', $studentId)->where('rsv_status', 'not_returned')->get();

        Session::put('student', $student);

        $data = [
            'student' => $student,
            'reservation' => $reservation,
            'reserved' => $reserved
        ];
        
        return view('reservation.show', $data);
    }

    public function store(StoreReservationRequest $request)
    {
        $userAuth = auth()->user()->email;
        $student = Student::where('email', $userAuth)->first();
        $studentId = $student->id;

        $newReservation = new Reservation();

        $newReservation['catalog_id'] = $request->catalog_id;
        $newReservation['student_id'] = $studentId;
        $newReservation['duration'] = $request->duration;
        $newReservation['status'] = 'waiting';

        $newReservation->save();

        return redirect()->route('catalog.index');
    }

    public function detailCatalog(Request $request)
    {
        $student = Session::get('student');

        $reservationId = $request->id;
        $studentId = $student->id;
        $reservation = Reservation::where('id', $reservationId)->get();

        Session::put('reservation', $reservation);

        $reservationId = $reservation[0]['id'];
        $reservationCatalogId = $reservation[0]['catalog_id'];

        $included = ['category','section'];
        $selected = ['serial_number'];

        $catalogDetail = Catalog::with($included)->where('id', $reservationCatalogId)->first();
        $availableSerial = Serial::select($selected)->where('catalog_id', $reservationCatalogId)->where('status', 'available')->get();
        $countAvailable = Serial::select($selected)->where('catalog_id', $reservationCatalogId)->where('status', 'available')->count();
        $data = [
            'catalogDetail' => $catalogDetail,
            'availableSerial' => $availableSerial,
            'studentId' => $studentId,
            'reservationId' => $reservationId,
            'countAvailable' => $countAvailable
        ];

        return view('reservation.result-catalog', $data);
    }

    public function updateReservation(Request $request)
    {
        $student = Session::get('student');
        $reservation = Session::get('reservation');

        $studentId = $student->id;
        $reservationId = $reservation[0]['id'];
        $reservationDuration = $reservation[0]['duration'];

        $serialNumber = $request->serial_number;
        $serial = Serial::where('serial_number', $serialNumber)->first();
        $serialId = $serial->id;
        $status = $request->status;

        $carbonNow = Carbon::now();
        $carbonDue = Carbon::now()->addMonths($reservationDuration);

        $now = $carbonNow->toDateString();
        $due = $carbonDue->toDateString();

        if ($status == 'approved') {

            $newReserved = new Reserved();

            $newReserved['serial_id'] = $serialId;
            $newReserved['student_id'] = $studentId;
            $newReserved['start_date'] = $now;
            $newReserved['duration'] = $reservationDuration;
            $newReserved['due_date'] = $due;

            $newReserved->save();

            $updateReservation = Reservation::where('id', $reservationId)->update(
                ['status' => 'approved']
            );
            
            $updateSerial = Serial::where('id', $serialId)->update(
                [
                 'status' => 'not_available',
                 'student_id' => $studentId
                ]
            );

            // Session::forget('reservation');

            return redirect()->route('admin-reservation-show');

        } else {
            
            $updateReservation = Reservation::where('id', $reservationId)->update(
                [
                 'status' => 'not_approved',
                 'info' => $request->info
                ]
            );

            // Session::forget('reservation');
            
            return redirect()->route('admin-reservation-show');
        }
    }
}
