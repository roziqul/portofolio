<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeStudent;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Reserved;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $student = Student::all();

        $data = [
            'no' => 1,
            'student' => $student,
        ];
        
        return view('student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $storedFilePath = Storage::putFile('public/student/photo', $request->file('photo'));
            $validated['photo'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
        }

        $student = Student::create($validated);
        
        return redirect(route('student.index'))->with('success', 'Data berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $included = ['serial','admin'];
        $student = Student::where('id', $id)->first();
        $studentEmail = $student->email;

        $userReserved = Reserved::with($included)->where('student_id', $id)->get();

        $checkExist = User::where('email', $studentEmail)->first();

        if ($checkExist != null) {
            $checkCondition = $checkExist->status;
            if ($checkCondition == 'active') {
                $status = 'active';
            } else {
                $status = 'nonactive';
            }

            $data = [
                'reserved' => $userReserved,
                'student' => $student,
                'status' => $status,
            ];
    
            return view('student.show', $data);

        } else {
            $status = 'unregistered';

            $data = [
                'student' => $student,
                'status' => $status,
            ];
    
            return view('student.show', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
