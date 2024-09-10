<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $value = User::where('role', 'ADMIN')->get();

        return view('Admin.User.Index', compact('value'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.User.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $saveUser = new User();

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|unique:users,email',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
            
        } elseif ($validator->passes()) {
            
            $saveUser['name'] = $request->username;
            $saveUser['email'] = $request->email;
            $saveUser['password'] = bcrypt($request->password);
            $saveUser['role'] = "ADMIN";

            $saveUser->save();
    
            return redirect()->route('users.index');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $value = User::where('id', $id)->get();

        return view('Admin.User.Edit', compact('value'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id   = $request->id;
        $auth = auth()->user()->name;

        $Validator = Validator::make($request->all(), [
            'username' => 'sometimes|required',
                            Rule::unique('users')->ignore($id),
            'email'    => 'sometimes|required',
                            Rule::unique('users')->ignore($id),
        ]);

        if ($Validator->fails()) {

            return redirect()->back()->withErrors($Validator)->withInput();

        } elseif ($Validator->passes()) {

            $update = User::where('id', $id)->update([
                'name'   => $request->username,
                'email'      => $request->email,
                'password'   => bcrypt($request->password),
                'updated_by' => $auth,
            ]);
    
            return redirect()->route('utilities.user');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
