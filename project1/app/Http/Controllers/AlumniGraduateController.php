<?php

namespace App\Http\Controllers;

use App\Models\AlumniGraduate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AlumniGraduateController extends Controller
{
    public function index()
    {
        $alumnigraduates = AlumniGraduate::all();

        $data = [
            'alumnigraduates' => $alumnigraduates
        ];

        return view('admin-side.alumni-graduate.index', $data);
    }

    public function create()
    {
        return view('admin-side.alumni-graduate.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'accepted_at' => 'required|string|max:255',
            'accepted_desc' => 'required|string|max:255',
            'year' => 'required|integer|digits:4',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('alumni-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        AlumniGraduate::create($validatedData);

        if (AlumniGraduate::create($validatedData)){
            Alert::success('Data berhasil ditambahkan');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('alumni-graduate.index');
    }

    public function show(string $id)
    {
        $alumniGraduate = AlumniGraduate::findOrFail($id);

        $data = [
            'alumniGraduate' => $alumniGraduate
        ];

        return view('admin-side.alumni-graduate.show', $data);
    }

    public function edit(string $id)
    {
        $alumniGraduate = AlumniGraduate::findOrFail($id);

        $data = [
            'alumniGraduate' => $alumniGraduate
        ];

        return view('admin-side.alumni-graduate.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $alumniGraduate = AlumniGraduate::findOrFail($id);

        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'accepted_at' => 'required|string|max:255',
            'accepted_desc' => 'required|string|max:255',
            'year' => 'required|integer|digits:4',
        ]);

        if ($request->hasFile('photo')) {
            if ($alumniGraduate->photo) {
                $oldPhotoPath = str_replace('public/', '', $alumniGraduate->photo);
                if (Storage::exists('public/' . $oldPhotoPath)) {
                    Storage::delete('public/' . $oldPhotoPath);
                }
            }
    
            $newPhotoPath = $request->file('photo')->store('alumni-photos', 'public');
            $validatedData['photo'] = $newPhotoPath;
        }

        $alumniGraduate->update($validatedData);

        if ($alumniGraduate->update($validatedData)){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal ditambahkan');
        }
        
        return redirect()->route('alumni-graduate.index');
    }

    public function destroy(string $id)
    {
        $alumniGraduate = AlumniGraduate::findOrFail($id);

        if ($alumniGraduate->photo) {
            $oldPhotoPath = str_replace('public/', '', $alumniGraduate->photo);
            if (Storage::exists('public/' . $oldPhotoPath)) {
                Storage::delete('public/' . $oldPhotoPath);
            }
        }

        $alumniGraduate->delete();

        if ($alumniGraduate->delete()){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('alumni-graduate.index');
    }
}
