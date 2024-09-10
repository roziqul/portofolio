<?php

namespace App\Http\Controllers;

use App\Models\Headmaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HeadmasterController extends Controller
{
    public function show()
    {
        $headmaster = Headmaster::first();

        $data = [
            'headmaster' => $headmaster
        ];

        return view('admin-side.headmaster.show', $data);
    }

    public function edit(string $id)
    {
        $headmaster = Headmaster::findOrFail($id);

        $data = [
            'headmaster' => $headmaster
        ];

        return view('admin-side.headmaster.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $headmaster = Headmaster::findOrFail($id);

        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'name' => 'required|string|max:255',
            'speech' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            if ($headmaster->photo) {
                $oldPhotoPath = str_replace('public/', '', $headmaster->photo);
                if (Storage::exists('public/' . $oldPhotoPath)) {
                    Storage::delete('public/' . $oldPhotoPath);
                }
            }
    
            $newPhotoPath = $request->file('photo')->store('headmaster-photos', 'public');
            $validatedData['photo'] = $newPhotoPath;
        }

        $headmaster->update($validatedData);

        if ($headmaster->update($validatedData)){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal diperbarui');
        }

        return redirect()->route('headmaster.show')->with('success', 'Headmaster data has been updated successfully.');
    }
}
