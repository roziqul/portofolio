<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCategory;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category = Category::all();

        $data = [
            'no' => 1,
            'category' => $category,
        ];

        return view('category.index', $data);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Category::create($validated);
        
        return redirect(route('category.index'))->with('success', 'Data berhasil ditambahkan !');
    }

    public function show(string $id)
    {
        $category = Category::where('id', $id)->get();
        $catalog = Catalog::where('category_id', $id)->get();
        $count = Catalog::where('category_id', $id)->count();

        $data = [
            'no' => 1,
            'category' => $category,
            'catalog' => $catalog,
            'count' => $count,
        ];

        return view('category.show', $data);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
