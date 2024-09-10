<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        $data = [
            'no' => 1,
            'articles' => $articles
        ];

        return view('admin.article.index', $data);
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'title' => 'required|string|max:255',
            'description' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('article-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $store = Article::create($validatedData);

        if ($store) {
            Alert::success('Artikel berhasil ditambahkan');
        } else {
            Alert::error('Artikel gagal ditambahkan');
        }

        return redirect()->route('article.index');
    }

    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        $data = [
            'article' => $article
        ];

        return view('admin.article.show', $data);
    }

    public function edit(string $id)
    {
        $article = Article::findOrFail($id);

        $data = [
            'article' => $article
        ];

        return view('admin.article.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);
        
        $validatedData = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            'title' => 'required|string|max:255',
            'description' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            if ($article->photo) {
                $oldPhotoPath = str_replace('public/', '', $article->photo);
                if (Storage::exists('public/' . $oldPhotoPath)) {
                    Storage::delete('public/' . $oldPhotoPath);
                }
            }
    
            $newPhotoPath = $request->file('photo')->store('article-photos', 'public');
            $validatedData['photo'] = $newPhotoPath;
        }

        $update = $article->update($validatedData);

        if ($update) {
            Alert::success('Artikel berhasil diperbarui');
        } else {
            Alert::error('Artikel gagal diperbarui');
        }

        return redirect()->route('article.index');
    }

    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        if ($article->photo) {
            $oldPhotoCustPath = str_replace('public/', '', $article->photo);
            if (Storage::exists('public/' . $oldPhotoCustPath)) {
                Storage::delete('public/' . $oldPhotoCustPath);
            }
        }

        $delete = $article->delete();

        if ($delete) {
            Alert::success('Artikel berhasil dihapus');
        } else {
            Alert::error('Artikel gagal dihapus');
        }

        return redirect()->route('article.index');
    }
}
