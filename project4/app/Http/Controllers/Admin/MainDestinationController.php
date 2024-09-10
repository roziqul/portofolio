<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MainDestinationController extends Controller
{
    public function index()
    {
        $destinations = MainDestination::all();

        $data = [
            'no' => 1,
            'destinations' => $destinations
        ];

        return view('admin.destination.main.index', $data);
    }

    public function create()
    {
        return view('admin.destination.main.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:main_destinations,name',
        ]);

        $store = MainDestination::create($validatedData);

        if ($store) {
            Alert::success('Destinasi Utama berhasil ditambahkan');
        } else {
            Alert::error('Destinasi Utama gagal ditambahkan');
        }

        return redirect()->route('maindestination.index');
    }

    public function show(string $id)
    {
        $maindestination = MainDestination::with('subDestinations')->findOrFail($id);

        $data = [
            'maindestination' => $maindestination
        ];

        return view('admin.destination.main.show', $data);
    }

    public function edit(string $id)
    {
        $main_destination = MainDestination::findOrFail($id);

        $data = [
            'main_destination' => $main_destination
        ];

        return view('admin.destination.main.edit');
    }

    public function update(Request $request, string $id)
    {
        $main_destination = MainDestination::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:main_destinations,name,' . $id,
        ]);   

        $update = $main_destination->update($validatedData);

        if ($update) {
            Alert::success('Destinasi Utama berhasil diperbarui');
        } else {
            Alert::error('Destinasi Utama gagal diperbarui');
        }

        return redirect()->route('maindestination.index');
    }

    public function destroy(string $id)
    {
        $main_destination = MainDestination::findOrFail($id);

        $destroy = $main_destination->delete();

        if ($destroy) {
            Alert::success('Destinasi Utama berhasil dihapus');
        } else {
            Alert::error('Destinasi Utama gagal dihapus');
        }

        return redirect()->route('maindestination.index');
    }
}
