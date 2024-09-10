<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::all();

        $data = [
            'no' => 1,
            'achievements' => $achievements
        ];

        return view('admin-side.achievement.index', $data);
    }

    public function create()
    {
        return view('admin-side.achievement.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'title' => 'required|string|max:255',
            'student_name' => 'required|string|max:255',
            'year' => 'required|integer|digits:4',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('achievements', 'public');
            $validatedData['photo'] = $photoPath;
        }

        Achievement::create($validatedData);

        if (Achievement::create($validatedData)){
            Alert::success('Data berhasil ditambahkan');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('achievement.index');
    }

    public function show(string $id)
    {
        $achievement = Achievement::findOrFail($id);

        $data = [
            'achievement' => $achievement
        ];

        return view('admin-side.achievement.show', $data);
    }

    public function edit(string $id)
    {
        $achievement = Achievement::findOrFail($id);

        $data = [
            'achievement' => $achievement
        ];

        return view('admin-side.achievement.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $achievement = Achievement::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'student_name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if ($request->hasFile('photo')) {
            if ($achievement->photo) {
                $oldPhotoPath = str_replace('public/', '', $achievement->photo);
                if (Storage::exists('public/' . $oldPhotoPath)) {
                    Storage::delete('public/' . $oldPhotoPath);
                }
            }
    
            $newPhotoPath = $request->file('photo')->store('achievements', 'public');
            $validatedData['photo'] = $newPhotoPath;
        }

        $achievement->update($validatedData);

        if ($achievement->update($validatedData)){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal diperbarui');
        }

        return redirect()->route('achievement.index');
    }

    public function destroy(string $id)
    {
        $achievement = Achievement::findOrFail($id);

        if ($achievement->photo) {
            $oldPhotoPath = str_replace('public/', '', $achievement->photo);
            if (Storage::exists('public/' . $oldPhotoPath)) {
                Storage::delete('public/' . $oldPhotoPath);
            }
        }

        $achievement->delete();

        if ($achievement->delete()){
            Alert::success('Data berhasil diperbarui');
        } else {
            Alert::error('Data gagal ditambahkan');
        }

        return redirect()->route('achievement.index');
    }
}
