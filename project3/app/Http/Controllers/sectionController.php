<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;

class sectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $section = Section::all();

        $data = [
            'no' => 1,
            'section' => $section,
        ];
        
        return view('section.index', $data);
    }

    public function create()
    {
        return view('section.create');
    }

    public function store(StoreSectionRequest $request)
    {
        $validated = $request->validated();
        $section = Section::create($validated);
        
        return redirect(route('section.index'))->with('success', 'Data berhasil ditambahkan !');
    }

    public function show(string $id)
    {
        $section = Section::where('id', $id)->get();
        $catalog = Catalog::where('section_id', $id)->get();
        $count = Catalog::where('section_id', $id)->count();
        $getCategory = Catalog::where('section_id', $id)->get('category_id');
        $category = Category::whereIn('id', $getCategory)->get();

        $data = [
            'no' => 1,
            'section' => $section,
            'catalog' => $catalog,
            'count' => $count,
            'category' => $category,
        ];

        return view('section.show', $data);
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
