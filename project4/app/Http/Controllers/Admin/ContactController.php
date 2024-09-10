<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();

        $data = [
            'contact' => $contact
        ];

        return view('admin.contact.show', $data);
    }

    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);

        $data = [
            'contact' => $contact
        ];

        return view('admin.contact.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);

        $validatedData = $request->validate([
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'contact_wa' => 'nullable|string|max:20',
            'contact_wechat' => 'nullable|string|max:20',
            'facebook' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);

        $contact->update($validatedData);

        if ($contact->update($validatedData)) {
            Alert::success('Kontak berhasil diperbarui');
        } else {
            Alert::error('Kontak gagal diperbarui');
        }

        return redirect()->route('contact.index');
    }

}
