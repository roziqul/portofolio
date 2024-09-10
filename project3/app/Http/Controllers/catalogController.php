<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\storeCatalog;
use App\Http\Requests\StoreCatalogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Catalog;
use App\Models\Section;
use App\Models\Serial;
class catalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $selected = ['id','category_id', 'section_id', 'title', 'writer'];
        $included = ['category', 'section'];

        $catalog = Catalog::with($included)->select($selected)->get();

        $data = [
            'no' => 1,
            'catalog' => $catalog,
        ];

        return view('catalog.index', $data);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $section = Section::all();

        $data = [
            'category' => $category,
            'section' => $section,
        ];

        return view('catalog.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatalogRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('cover')) {
            $storedFilePath = Storage::putFile('public/cover', $request->file('cover'));
            $validated['cover'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
        }

        $catalog = Catalog::create($validated);
        
        return redirect(route('catalog.index'))->with('success', 'Data berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $included = ['category','section'];

        $catalogDetail = Catalog::with($included)->where('id', $id)->first();
        $availableSerialNumber = Serial::where('catalog_id', $id)->where('status', 'available')->count();

        $data = [
            'catalogDetail' => $catalogDetail,
            'availableSerialNumber' => $availableSerialNumber,
        ];

        return view('catalog.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
