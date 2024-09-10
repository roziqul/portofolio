<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\MainDestination;
use App\Models\SubDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    public function index()
    {
        $galeries = Gallery::with('SubDestination')->get();

        $data = [
            'no' => 1,
            'galeries' => $galeries
        ];

        return view('admin.gallery.index', $data);
    }

    public function create()
    {
        $destinations = SubDestination::all();

        $data = [
            'destinations' => $destinations
        ];
        
        return view('admin.gallery.create', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'sub_destination_id' => 'required|exists:sub_destinations,id',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('gallery-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $store = Gallery::create($validatedData);

        if ($store) {
            Alert::success('Galeri berhasil ditambahkan');
        } else {
            Alert::error('Galeri gagal ditambahkan');
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

        $destroy = $gallery->delete();

        if ($destroy) {
            Alert::success('Galeri berhasil dihapus');
        } else {
            Alert::error('Galeri gagal dihapus');
        }

        return redirect()->route('gallery.index');
    }
}
