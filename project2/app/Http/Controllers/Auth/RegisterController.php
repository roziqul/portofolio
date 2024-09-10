<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublicRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Seleksi;
use App\Models\Archieve;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Ortu;
use App\Models\psb;
use App\Models\spp;

class RegisterController extends Controller
{
    public function show()
    {
        return view('Auth.Register');
    }
    public function register(Request $request) 
    {
        $uid  = random_int(111111, 999999);

        $user = new User();
        $Siswa = new Siswa();
        $Ortu = new Ortu();
        $Archieve = new Archieve();
        $psb = new psb();
        $spp = new spp();
        $Daftar = new Pendaftaran();
        $Seleksi = new Seleksi();

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|unique:users,email',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
            
        } elseif ($validator->passes()) {
            
            $user['id'] = $uid;
            $user['name']     = $request->username;
            $user['email']    = $request->email;
            $user['password'] = bcrypt($request->password);
            $user['role']     = "PUBLIC";

            $Siswa['id']          = $uid;
            $Siswa['users_id']    = $uid;
            $Ortu['siswa_id']     = $uid;
            $Archieve['siswa_id'] = $uid;
            $psb['siswa_id']      = $uid;
            $spp['siswa_id']      = $uid;
            $Daftar['id']         = $uid;
            $Daftar['siswa_id']   = $uid;
            $Seleksi['daftar_id'] = $uid;
            $Seleksi['siswa_id']  = $uid;

            $user->save();
            $Siswa->save();
    
            $psb->save();
            $spp->save();
            $Ortu->save();
            $Archieve->save();
            $Daftar->save();
            $Seleksi->save();
    
            return view('Auth.Login')->with('success', 'Data berhasil ditambahkan !');

        }
    }
}
