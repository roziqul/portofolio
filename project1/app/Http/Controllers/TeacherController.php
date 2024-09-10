<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();

        $data = [
            'teachers' => $teachers
        ];

        return view('admin-side.teacher.index', $data);
    }

    public function create()
    {
        return view('admin-side.teacher.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:18|unique:teachers,nip',
            'position_id' => 'required|exists:positions,id',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('teacher-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        Teacher::create($validatedData);

        if (Teacher::create($validatedData)){
            Alert::success('Data berhasil ditambahkan');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('teacher.index');
    }

    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $data = [
            'teacher' => $teacher
        ];

        return view('admin-side.teacher.show', $data);
    }

    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $data = [
            'teacher' => $teacher
        ];

        return view('admin-side.teacher.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:18|unique:teachers,nip,' . $id,
            'position_id' => 'required|exists:positions,id',
        ]);

        if ($request->hasFile('photo')) {
            if ($teacher->photo) {
                $oldPhotoPath = str_replace('public/', '', $teacher->photo);
                if (Storage::exists('public/' . $oldPhotoPath)) {
                    Storage::delete('public/' . $oldPhotoPath);
                }
            }
    
            $newPhotoPath = $request->file('photo')->store('teacher-photos', 'public');
            $validatedData['photo'] = $newPhotoPath;
        }

        $teacher->update($validatedData);

        return redirect()->route('teacher.index');
    }

    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->photo) {
            $oldPhotoPath = str_replace('public/', '', $teacher->photo);
            if (Storage::exists('public/' . $oldPhotoPath)) {
                Storage::delete('public/' . $oldPhotoPath);
            }
        }

        $teacher->delete();

        if ($teacher->delete()){
            Alert::success('Data berhasil dihapus');
        } else {
            Alert::error('Data gagal dihapus');
        }

        return redirect()->route('teacher.index');
    }
}

