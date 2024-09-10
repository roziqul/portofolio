<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdministratorRequest;
use App\Models\Administrator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class administratorController extends Controller
{
    public function index()
    {
        $administrator = Administrator::all();

        $data = [
            'no' => 1,
            'administrator' => $administrator,
        ];

        return view('administrator.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdministratorRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $storedFilePath = Storage::putFile('public/photo/administrator', $request->file('photo'));
            $validated['photo'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
        }

        $administrator = Administrator::create($validated);
        
        return redirect(route('administrator.index'))->with('success', 'Data berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $administrator = Administrator::where('id', $id)->get();
        $administratorEmail = $administrator[0]['email'];

        $checkExist = User::where('email', $administratorEmail)->first();

        if ($checkExist != null) {
            $checkCondition = $checkExist->status;
            if ($checkCondition == 'active') {
                $status = 'active';
            } else {
                $status = 'nonactive';
            }

            $data = [
                'administrator' => $administrator,
                'status' => $status,
            ];
    
            return view('administrator.show', $data);

        } else {
            $status = 'unregistered';

            $data = [
                'administrator' => $administrator,
                'status' => $status,
            ];
    
            return view('administrator.show', $data);
        }           

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
