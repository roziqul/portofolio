<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        $data = [
            'sliders' => $sliders
        ];

        return view('admin-side.slider.index', $data);
    }

    public function create()
    {
        return view('admin-side.slider.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('slider-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        Slider::create($validatedData);

        if (Slider::create($validatedData)){
            Alert::success('Data berhasil ditambahkan');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('slider.index');
    }

    public function show(string $id)
    {
        $slider = Slider::findOrFail($id);

        $data = [
            'slider' => $slider
        ];

        return view('admin-side.slider.show', $data);
    }

    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);

        $data = [
            'slider' => $slider
        ];

        return view('admin-side.slider.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            if ($slider->photo) {
                $oldPhotoPath = str_replace('public/', '', $slider->photo);
                if (Storage::exists('public/' . $oldPhotoPath)) {
                    Storage::delete('public/' . $oldPhotoPath);
                }
            }
    
            $newPhotoPath = $request->file('photo')->store('slider-photos', 'public');
            $validatedData['photo'] = $newPhotoPath;
        }

        $slider->update($validatedData);

        if ($slider->update($validatedData)){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal diperbarui');
        }

        return redirect()->route('slider.index');
    }

    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->photo) {
            $oldPhotoPath = str_replace('public/', '', $slider->photo);
            if (Storage::exists('public/' . $oldPhotoPath)) {
                Storage::delete('public/' . $oldPhotoPath);
            }
        }

        $slider->delete();

        if ($slider->delete()){
            Alert::success('Data berhasil dihapus');
        } else {
            Alert::error('Data gagal dihapus');
        }

        return redirect()->route('slider.index');
    }
}

