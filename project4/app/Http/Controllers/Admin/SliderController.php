<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'no' => 1,
            'sliders' => $sliders
        ];

        return view('admin.slider.index', $data);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('slider-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $store = Slider::create($validatedData);

        if ($store) {
            Alert::success('Slider berhasil ditambahkan');
        } else {
            Alert::error('Slider gagal ditambahkan');
        }

        return redirect()->route('slider.index');
    }

    public function show(string $id)
    {
        $slider = Slider::findOrFail($id);

        $data = [
            'slider' => $slider
        ];

        return view('admin.slider.show', $data);
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

        $destroy = $slider->delete();

        if ($destroy) {
            Alert::success('Slider berhasil dihapus');
        } else {
            Alert::error('Slider gagal dihapus');
        }

        return redirect()->route('slider.index');
    }
}
