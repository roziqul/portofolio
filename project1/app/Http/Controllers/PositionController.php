<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();

        $data = [
            'positions' => $positions
        ];

        return view('admin-side.position.index', $data);
    }

    public function create()
    {
        return view('admin-side.position.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:positions,name',
        ]);

        Position::create($validatedData);

        if (Position::create($validatedData)){
            Alert::success('Data berhasil ditambahkan');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('position.index');
    }

    public function edit(string $id)
    {
        $position = Position::findOrFail($id);

        $data = [
            'position' => $position
        ];

        return view('admin-side.position.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $position = Position::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:positions,name,' . $id,
        ]);        

        $position->update($validatedData);

        if ($position->update($validatedData)){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal diperbarui');
        }

        return redirect()->route('position.index');
    }

    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);

        $position->delete();

        if ($position->delete()){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal diperbarui');
        }

        return redirect()->route('position.index');
    }
}

