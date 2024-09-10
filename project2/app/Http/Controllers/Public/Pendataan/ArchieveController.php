<?php

namespace App\Http\Controllers\Public\Pendataan;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateArchieveRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Archieve;
use App\Models\Siswa;
use App\Models\PSB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ArchieveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fitur = Feature::where('id', 1)->get();
        $uid   = auth()->user()->id;
        $archieve = Archieve::where('siswa_id', $uid)->get();
        $siswa = Siswa::where('id', $uid)->get();

        return view('Public.Pendataan.Archieve', compact('archieve','fitur','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        $uid     = auth()->user()->id;
        $arc     = Archieve::where('siswa_id', $uid)->first();

        $mergedErrors = [];

        $fotoValidator    = Validator::make($request->only('foto'),[   
            'foto'        => 'mimes:jpeg,png,jpg |max:4096'    
        ]);
        $kkValidator      = Validator::make($request->only('kk'),[
            'kk'          => 'mimes:pdf|max:2048',
        ]);
        $aktaValidator    = Validator::make($request->only('akta'),[
            'akta'        => 'mimes:pdf|max:2048',
        ]);
        $nisnValidator    = Validator::make($request->only('nisn'),[
            'nisn'        => 'mimes:pdf|max:2048',
        ]);
        $raport1Validator = Validator::make($request->only('raport1'),[
            'raport1'     => 'mimes:pdf|max:2048',
        ]);
        $raport2Validator = Validator::make($request->only('raport2'),[
            'raport2'     => 'mimes:pdf|max:2048',
        ]);
        $raport3Validator = Validator::make($request->only('raport3'),[
            'raport3'     => 'mimes:pdf|max:2048',
        ]);
        $raport4Validator = Validator::make($request->only('raport4'),[
            'raport4'     => 'mimes:pdf|max:2048',
        ]);
        $raport5Validator = Validator::make($request->only('raport5'),[
            'raport5'     => 'mimes:pdf|max:2048',
        ]);
        $sklValidator     = Validator::make($request->only('skl'),[
            'skl'         => 'mimes:pdf|max:2048',
        ]);

        if($fotoValidator->fails()||$kkValidator->fails()||$aktaValidator->fails()||$nisnValidator->fails()||$raport1Validator->fails()||$raport2Validator->fails()||$raport3Validator->fails()||$raport4Validator->fails()||$raport5Validator->fails()||$sklValidator->fails()){
            $mergedErrors = $fotoValidator->errors()->
                            merge($kkValidator->errors())->
                            merge($aktaValidator->errors())->
                            merge($nisnValidator->errors())->
                            merge($raport1Validator->errors())->
                            merge($raport2Validator->errors())->
                            merge($raport3Validator->errors())->
                            merge($raport4Validator->errors())->
                            merge($raport5Validator->errors())->
                            merge($sklValidator->errors());
        }

        if($request->hasFile('foto')){
            if ($fotoValidator->passes()) {
                $storedFilePath = Storage::putFile('public/foto_siswa', $request->file('foto'));
                $validated['foto'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
    
                $valid = $arc->update(['foto' => $validated['foto']]);
            }
        }
        if($request->hasFile('kk')){
            if ($kkValidator->passes()) {
                $storedFilePath = Storage::putFile('public/kk_siswa', $request->file('kk'));
                $validated['kk'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
    
                $valid = $arc->update(['kk' => $validated['kk']]);
            }
        }
        if($request->hasFile('akta')){
            if ($aktaValidator->passes()) {
                $storedFilePath = Storage::putFile('public/akta_siswa', $request->file('akta'));
                $validated['akta'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
    
                $valid = $arc->update(['akta' => $validated['akta']]);
            }
        }
        if($request->hasFile('nisn')){
            if ($nisnValidator->passes()) {
                $storedFilePath = Storage::putFile('public/nisn_siswa', $request->file('nisn'));
                $validated['nisn'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
    
                $valid = $arc->update(['nisn' => $validated['nisn']]);
            }
        }
        if($request->hasFile('raport1')){
            if ($raport1Validator->passes()) {
                $storedFilePath = Storage::putFile('public/raport1_siswa', $request->file('raport1'));
                $validated['raport1'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
    
                $valid = $arc->update(['raport1' => $validated['raport1']]);
            }
        }
        if($request->hasFile('raport2')){
            if ($raport2Validator->passes()) {
                $storedFilePath = Storage::putFile('public/raport2_siswa', $request->file('raport2'));
                $validated['raport2'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
    
                $valid = $arc->update(['raport2' =>  $validated['raport2']]);
            }
        }
        if($request->hasFile('raport3')){
            if ($raport3Validator->passes()) {
                $storedFilePath = Storage::putFile('public/raport3_siswa', $request->file('raport3'));
                $validated['raport3'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
    
                $valid = $arc->update(['raport3' => $validated['raport3']]);
            }
        }
        if($request->hasFile('raport4')){
            if ($raport4Validator->passes()) {
                $storedFilePath = Storage::putFile('public/raport4_siswa', $request->file('raport4'));
                $validated['raport4'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
    
                $valid = $arc->update(['raport4' => $validated['raport4']]);
            }
        }
        if($request->hasFile('raport5')){
            if ($raport5Validator->passes()) {
                $storedFilePath = Storage::putFile('public/raport5_siswa', $request->file('raport5'));
                $validated['raport5'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
    
                $valid = $arc->update(['raport5' => $validated['raport5']]);
            }
        }
        if($request->hasFile('skl')){
            if ($sklValidator->passes()) {
                $storedFilePath = Storage::putFile('public/skl_siswa', $request->file('skl'));
                $validated['skl'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
    
                $valid = $arc->update(['skl' => $validated['skl']]);
            }
        }

        if ($mergedErrors == null) {
            return redirect()->route('get.pendataan.payment')->with('success', 'Data berhasil diupdate !');
        } else {
            return redirect()->back()->withErrors($mergedErrors)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
