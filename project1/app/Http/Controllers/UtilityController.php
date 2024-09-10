<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UtilityController extends Controller
{
    public function show()
    {
        $utility = Utility::first();

        $data = [
            'utility' => $utility
        ];

        return view('admin-side.utility.show', $data);
    }

    public function edit()
    {
        $utility = Utility::first();

        $data = [
            'utility' => $utility
        ];

        return view('admin-side.utility.edit', $data);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'school_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'school_name' => 'required|string|max:255',
            'school_address' => 'required|string|max:255',
            'school_email' => 'required|email|max:255',
            'school_website' => 'nullable|url|max:255',
            'school_contact' => 'required|string|max:20',
            'school_vision' => 'required|string',
            'school_mission' => 'required|string',
            'total_class' => 'required|integer|min:1',
            'total_student' => 'required|integer|min:1',
        ]);

        $utility = Utility::first();

        if ($request->hasFile('school_logo')) {
            if ($utility->school_logo) {
                Storage::disk('public')->delete($utility->school_logo);
            }

            $logoPath = $request->file('school_logo')->store('school-logos', 'public');
            $validatedData['school_logo'] = $logoPath;
        } else {
            $validatedData['school_logo'] = $utility->school_logo;
        }

        $utility->update($validatedData);

        return redirect()->route('utility.show')->with('success', 'Utility settings have been updated successfully.');
    }
}

