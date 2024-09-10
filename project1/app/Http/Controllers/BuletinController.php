<?php

namespace App\Http\Controllers;

use App\Models\Buletin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BuletinController extends Controller
{
    public function index()
    {
        $buletins = Buletin::all();

        $data = [
            'buletins' => $buletins
        ];

        return view('admin-side.buletin.index', $data);
    }

    public function create()
    {
        return view('admin-side.buletin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('buletin-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        Buletin::create($validatedData);

        if (Buletin::create($validatedData)){
            Alert::success('Data berhasil ditambahkan');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('buletin.index');
    }

    public function show(string $id)
    {
        $buletin = Buletin::findOrFail($id);

        $data = [
            'buletin' => $buletin
        ];

        return view('admin-side.buletin.show', $data);
    }

    public function edit(string $id)
    {
        $buletin = Buletin::findOrFail($id);

        $data = [
            'buletin' => $buletin
        ];

        return view('admin-side.buletin.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $buletin = Buletin::findOrFail($id);

        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            if ($buletin->photo) {
                $oldPhotoPath = str_replace('public/', '', $buletin->photo);
                if (Storage::exists('public/' . $oldPhotoPath)) {
                    Storage::delete('public/' . $oldPhotoPath);
                }
            }
    
            $newPhotoPath = $request->file('photo')->store('buletin-photos', 'public');
            $validatedData['photo'] = $newPhotoPath;
        }

        $buletin->update($validatedData);

        if ($buletin->update($validatedData)){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('buletin.index');
    }

    public function destroy(string $id)
    {
        $buletin = Buletin::findOrFail($id);

        if ($buletin->photo) {
            $oldPhotoPath = str_replace('public/', '', $buletin->photo);
            if (Storage::exists('public/' . $oldPhotoPath)) {
                Storage::delete('public/' . $oldPhotoPath);
            }
        }

        $buletin->delete();

        if ($buletin->delete()){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('buletin.index');
    }
}

