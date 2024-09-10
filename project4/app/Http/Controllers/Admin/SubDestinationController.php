<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainDestination;
use App\Models\SubDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SubDestinationController extends Controller
{
    public function index()
    {
        $maindestinations = MainDestination::with(['subDestinations'])->get();

        $data = [
            'no' => 1,
            'maindestinations' => $maindestinations
        ];

        return view('admin.destination.sub.index', $data);
    }

    public function create()
    {
        $maindestinations = MainDestination::all();

        $data = [
            'maindestinations' => $maindestinations
        ];

        return view('admin.destination.sub.create', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'main_destination_id' => 'required|exists:main_destinations,id',
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('subdestination-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $store = SubDestination::create($validatedData);

        if ($store) {
            Alert::success('Subdestinasi berhasil ditambahkan');
        } else {
            Alert::error('Subdestinasi gagal ditambahkan');
        }

        return redirect()->route('subdestination.index');
    }

    public function show(string $id)
    {
        $subdestination = SubDestination::findOrFail($id);

        $data = [
            'subdestination' => $subdestination
        ];

        return view('admin.destination.sub.show', $data);
    }

    public function edit(string $id)
    {
        $maindestinations = MainDestination::all();
        $subdestination = SubDestination::with('MainDestination')->findOrFail($id);

        $data = [
            'subdestination' => $subdestination,
            'maindestinations' => $maindestinations
        ];

        return view('admin.destination.sub.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $sub_destination = SubDestination::findOrFail($id);

        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'main_destination_id' => 'required|exists:main_destinations,id',
            'name' => 'required|string|max:255|unique:sub_destinations,name,' . $id,
        ]);    
            
        if ($request->hasFile('photo')) {
            if ($sub_destination->photo) {
                $oldPhotoPath = str_replace('public/', '', $sub_destination->photo);
                if (Storage::exists('public/' . $oldPhotoPath)) {
                    Storage::delete('public/' . $oldPhotoPath);
                }
            }

            $newPhotoPath = $request->file('photo')->store('subdestination-photos', 'public');
            $validatedData['photo'] = $newPhotoPath;
        }

        $update = $sub_destination->update($validatedData);

        if ($update) {
            Alert::success('Subdestinasi berhasil diperbarui');
        } else {
            Alert::error('Subdestinasi gagal diperbarui');
        }

        return redirect()->route('subdestination.index');
    }

    public function destroy(string $id)
    {
        $sub_destination = SubDestination::findOrFail($id);

        if ($sub_destination->photo) {
            $oldPhotoPath = str_replace('public/', '', $sub_destination->photo);
            if (Storage::exists('public/' . $oldPhotoPath)) {
                Storage::delete('public/' . $oldPhotoPath);
            }
        }

        $destroy = $sub_destination->delete();

        if ($destroy) {
            Alert::success('Subdestinasi berhasil dihapus');
        } else {
            Alert::error('Subdestinasi gagal dihapus');
        }

        return redirect()->route('subdestination.index');
    }
}
