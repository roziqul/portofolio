<?php

namespace App\Http\Controllers;

use App\Models\Extraculiculer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ExtraculiculerController extends Controller
{
    public function index()
    {
        $extras = Extraculiculer::all();

        $data = [
            'no' => 1,
            'extras' => $extras
        ];

        return view('admin-side.extraculiculer.index', $data);
    }

    public function create()
    {
        return view('admin-side.extraculiculer.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('extraculiculer-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        Extraculiculer::create($validatedData);

        if (Extraculiculer::create($validatedData)){
            Alert::success('Data berhasil ditambahkan');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('extraculiculer.index');
    }

    public function show(string $id)
    {
        $extra = Extraculiculer::findOrFail($id);

        $data = [
            'extra' => $extra
        ];

        return view('admin-side.extraculiculer.show', $data);
    }

    public function edit(string $id)
    {
        $extra = Extraculiculer::findOrFail($id);

        $data = [
            'extra' => $extra
        ];

        return view('admin-side.extraculiculer.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $extra = Extraculiculer::findOrFail($id);

        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            if ($extra->photo) {
                $oldPhotoPath = str_replace('public/', '', $extra->photo);
                if (Storage::exists('public/' . $oldPhotoPath)) {
                    Storage::delete('public/' . $oldPhotoPath);
                }
            }
    
            $newPhotoPath = $request->file('photo')->store('extraculiculer-photos', 'public');
            $validatedData['photo'] = $newPhotoPath;
        }

        $extra->update($validatedData);

        if ($extra->update($validatedData)){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal ditambahkan');
        }
        
        return redirect()->route('extraculiculer.index');
    }

    public function destroy(string $id)
    {
        $extra = Extraculiculer::findOrFail($id);

        if ($extra->photo) {
            $oldPhotoPath = str_replace('public/', '', $extra->photo);
            if (Storage::exists('public/' . $oldPhotoPath)) {
                Storage::delete('public/' . $oldPhotoPath);
            }
        }

        $extra->delete();

        if ($extra->delete()){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('extraculiculer.index');
    }
}
