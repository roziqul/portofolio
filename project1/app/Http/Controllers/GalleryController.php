<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();

        $data = [
            'galleries' => $galleries
        ];

        return view('admin-side.gallery.index', $data);
    }

    public function create()
    {
        return view('admin-side.gallery.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'year' => 'required|integer|digits:4',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('gallery-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        Gallery::create($validatedData);

        if (Gallery::create($validatedData)){
            Alert::success('Data berhasil ditambahkan');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('gallery.index');
    }

    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $data = [
            'gallery' => $gallery
        ];

        return view('admin-side.gallery.show', $data);
    }

    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $data = [
            'gallery' => $gallery
        ];

        return view('admin-side.gallery.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'year' => 'required|integer|digits:4',
        ]);

        if ($request->hasFile('photo')) {
            if ($gallery->photo) {
                $oldPhotoPath = str_replace('public/', '', $gallery->photo);
                if (Storage::exists('public/' . $oldPhotoPath)) {
                    Storage::delete('public/' . $oldPhotoPath);
                }
            }
    
            $newPhotoPath = $request->file('photo')->store('gallery-photos', 'public');
            $validatedData['photo'] = $newPhotoPath;
        }

        $gallery->update($validatedData);

        if ($gallery->update($validatedData)){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal diperbarui');
        }

        return redirect()->route('gallery.index');
    }

    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->photo) {
            $oldPhotoPath = str_replace('public/', '', $gallery->photo);
            if (Storage::exists('public/' . $oldPhotoPath)) {
                Storage::delete('public/' . $oldPhotoPath);
            }
        }

        $gallery->delete();

        if ($gallery->delete()){
            Alert::success('Data berhasil dihapus');
        } else {
            Alert::error('Data gagal dihapus');
        }

        return redirect()->route('gallery.index');
    }
}

