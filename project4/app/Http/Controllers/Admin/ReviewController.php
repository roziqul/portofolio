<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\SubDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();

        $data = [
            'no' => 1,
            'reviews' => $reviews 
        ];

        return view('admin.review.index', $data);
    }

    public function create()
    {
        $subdestinations = SubDestination::all();

        $data = [
            'subdestinations' => $subdestinations
        ];
        
        return view('admin.review.create', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo_customer' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'name' => 'required|string|max:255',
            'sub_destination_id' => 'required|exists:sub_destinations,id',
            'review' => 'required|string|max:255',
            'documentation' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if ($request->hasFile('photo_customer') && $request->hasFile('documentation')) {
            $photoCustPath = $request->file('photo_customer')->store('cust-photos', 'public');
            $photoDocPath = $request->file('documentation')->store('documentation', 'public');
            $validatedData['photo_customer'] = $photoCustPath;
            $validatedData['documentation'] = $photoDocPath;
        }

        $store = Review::create($validatedData);

        if ($store) {
            Alert::success('Ulasan berhasil ditambahkan');
        } else {
            Alert::error('Ulasan gagal ditambahkan');
        }

        return redirect()->route('review.index');
    }

    public function show(string $id)
    {
        $review = Review::with('subDestination')->findOrFail($id);

        $data = [
            'review' => $review
        ];

        return view('admin.review.show', $data);
    }

    public function edit(string $id)
    {
        $review = Review::with('SubDestination')->findOrFail($id);
        $subdestinations = SubDestination::all();

        $data = [
            'review' => $review,
            'subdestinations' => $subdestinations
        ];

        return view('admin.review.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $review = Review::findOrFail($id);

        $validatedData = $request->validate([
            'photo_customer' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'name' => 'required|string|max:255',
            'sub_destination_id' => 'required|exists:sub_destinations,id',
            'review' => 'required|string|max:255',
            'documentation' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if ($request->hasFile('photo_customer')) {
            if ($review->photo_customer) {
                $oldPhotoPath = 'public/' . $review->photo_customer;
                if (Storage::exists($oldPhotoPath)) {
                    Storage::delete($oldPhotoPath);
                }
            }

            $newPhotoCustPath = $request->file('photo_customer')->store('cust-photos', 'public');
            $validatedData['photo_customer'] = $newPhotoCustPath;
        }

        // Proses upload dokumentasi baru jika ada
        if ($request->hasFile('documentation')) {
            // Hapus dokumentasi lama jika ada
            if ($review->documentation) {
                $oldDocPath = 'public/' . $review->documentation;
                if (Storage::exists($oldDocPath)) {
                    Storage::delete($oldDocPath);
                }
            }

            // Simpan dokumentasi baru
            $newPhotoDocPath = $request->file('documentation')->store('documentation', 'public');
            $validatedData['documentation'] = $newPhotoDocPath;
        }

        $update = $review->update($validatedData);

        if ($update) {
            Alert::success('Ulasan berhasil diperbarui');
        } else {
            Alert::error('Ulasan gagal diperbarui');
        }

        // Redirect ke halaman index
        return redirect()->route('review.index');
    }

    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);

        if ($review->photo_customer && $review->documentation) {
            $oldPhotoCustPath = str_replace('public/', '', $review->photo_customer);
            $oldPhotoDocPath = str_replace('public/', '', $review->documentation);
            if (Storage::exists('public/' . $oldPhotoCustPath) || Storage::exists('public/' . $oldPhotoDocPath)) {
                Storage::delete('public/' . $oldPhotoCustPath);
                Storage::delete('public/' . $oldPhotoDocPath);
            }
        }

        $destroy = $review->delete();

        if ($destroy) {
            Alert::success('Ulasan berhasil dihapus');
        } else {
            Alert::error('Ulasan gagal dihapus');
        }

        return redirect()->route('review.index');
    }
}
