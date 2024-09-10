<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Feature;
use App\Models\Seleksi;
use App\Models\Jurusan;
use App\Models\Archieve;
use App\Models\Siswa;
use App\Models\User;

class SeleksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function filter(Request $request)
    {
        $no = 1;

        $cond1  = 'NOT VERIFIED';
        $cond2  = 'WAITING VERIFICATION';
        $cond3  = 'VERIFIED';
        $filter = $request->input('filter');

        $notverified = Pendaftaran::where('status', $cond1)->get('id');
        $waiting     = Pendaftaran::where('status', $cond2)->get('id');
        $verified    = Pendaftaran::where('status', $cond3)->get('id');
    
        switch ($filter) {
            case 'option1': //ALL DATA
                $filteredData = Pendaftaran::whereIn('id', $notverified)->orWhereIn('id', $waiting)->orWhereIn('id', $verified)->orderBy('status', 'ASC')->orderBy('updated_at', 'ASC')->get();
                break;
            case 'option2': //NOT VERIFIED
                $filteredData = Pendaftaran::whereIn('id', $notverified)->orderBy('updated_at', 'ASC')->get();
                break;
            case 'option3': //WAITING VERIFICATION
                $filteredData = Pendaftaran::whereIn('id', $waiting)->orderBy('updated_at', 'ASC')->get();
                break;
            case 'option4': //VERIFIED
                $filteredData = Pendaftaran::whereIn('id', $verified)->orderBy('updated_at', 'ASC')->get();
                break;
            default :
                $filteredData = Pendaftaran::whereIn('id', $notverified)->orWhereIn('id', $waiting)->orWhereIn('id', $verified)->orderBy('status', 'ASC')->orderBy('updated_at', 'ASC')->get();
            break;
        }     

        return view('Admin.Seleksi.Index', compact('filteredData','no'));
    }
    public function get($id)
    {
        $daftar  = Pendaftaran::where('siswa_id', $id)->get();
        $seleksi = Seleksi::where('siswa_id', $id)->get();
        $siswa   = Siswa::where('id', $id)->get();
        $fitur   = Feature::where('id', 2)->get();
        $user    = User::where('id', $id)->get();
        $archieve  = Archieve::where('siswa_id', $id)->get(); 

        return view('Admin.Seleksi.Show', compact('daftar','seleksi','siswa','fitur','user','archieve'));
    }
    public function post(Request $request)
    {
        $id     = $request->id;
        $status = $request->status;
        $point  = $request->point;
        
        $postDaftar = Pendaftaran::where('id', $id)->update([
            'status' => $status,
        ]);

        $postSeleksi = Seleksi::where('siswa_id', $id)->update([
            'point' => $point,
        ]);

        return redirect()->route('filterSeleksi');
    }
    // public function rank()
    // {
    //     $fitur = Feature::where('id', 3)->get();
    //     $ipa   = Jurusan::where('id', 1)->first();
    //     $ips   = Jurusan::where('id', 2)->first();
        
    //     $quota_ipa = $ipa->quota;
    //     $quota_ips = $ips->quota;

    //     $IPA_Rank = 1; 
    //     $IPS_Rank = 1;
    //     $NT_Rank  = 1;
        
    //     $S1_IPA = Seleksi::where('status', '!=', 'RESIGN')->where('jurusan1', 1)->orderBy('point', 'DESC')->take($quota_ipa)->get('siswa_id')->toArray();
    //     $S1_IPS = Seleksi::where('status', '!=', 'RESIGN')->where('jurusan1', 2)->orderBy('point', 'DESC')->take($quota_ips)->get('siswa_id')->toArray();

    //     $NT1_IPA = Seleksi::where('status', '!=', 'RESIGN')->where('jurusan1', 1)->whereNotIn('siswa_id', $S1_IPA)->orderBy('point', 'DESC')->get('siswa_id')->toArray();
    //     $NT1_IPS = Seleksi::where('status', '!=', 'RESIGN')->where('jurusan1', 2)->whereNotIn('siswa_id', $S1_IPS)->orderBy('point', 'DESC')->get('siswa_id')->toArray();

    //     $S2_IPA = Seleksi::where('status', '!=', 'RESIGN')->where('jurusan2', 1)->whereIn('siswa_id', $NT1_IPA)->orWhereIn('siswa_id', $NT1_IPS)->orderBy('point', 'DESC')->get('siswa_id')->toArray();
    //     $S2_IPS = Seleksi::where('status', '!=', 'RESIGN')->where('jurusan2', 2)->whereIn('siswa_id', $NT1_IPS)->orWhereIn('siswa_id', $NT1_IPA)->orderBy('point', 'DESC')->get('siswa_id')->toArray();

    //     $Valid_IPA = Seleksi::whereIn('siswa_id', $S1_IPA)->orWhereIn('siswa_id', $S2_IPA)->orderBy('point', 'DESC')->take($quota_ipa)->get('siswa_id');
    //     $Valid_IPS = Seleksi::whereIn('siswa_id', $S1_IPS)->orWhereIn('siswa_id', $S2_IPS)->orderBy('point', 'DESC')->take($quota_ips)->get('siswa_id');

    //     $NT_ID = Seleksi::whereNotIn('siswa_id', $Valid_IPA)->whereNotIn('siswa_id', $Valid_IPS)->get('siswa_id');

    //     //STATUS SELEKSI
    //     $STAT_LP1 = Seleksi::where('status', '!=', 'RESIGN')->whereIn('siswa_id', $S1_IPA)->orwhereIn('siswa_id', $S1_IPS)->update([
    //         'status'  => 'LOLOS P1',
    //     ]);
    //     $STAT_LP2 = Seleksi::where('status', '!=', 'RESIGN')->whereIn('siswa_id', $S2_IPA)->orwhereIn('siswa_id', $S2_IPS)->update([
    //         'status'  => 'LOLOS P2',
    //     ]);
    //     $STAT_NT  = Seleksi::where('status', '!=', 'RESIGN')->whereIn('siswa_id', $NT_ID)->update([
    //         'status'  => 'TIDAK LOLOS',
    //     ]);

    //     //JURUSAN YANG DITERIMA
    //     $DITERIMA_IPA = Seleksi::whereIn('siswa_id', $S1_IPA)->orWhereIn('siswa_id', $S2_IPA)->update([
    //         'accepted'  => 1,
    //     ]);
    //     $DITERIMA_IPS = Seleksi::whereIn('siswa_id', $S1_IPS)->orWhereIn('siswa_id', $S2_IPS)->update([
    //         'accepted'  => 2,
    //     ]);
    //     $GAK_ACC = Seleksi::whereIn('siswa_id', $NT_ID)->update([
    //         'accepted'  => null,
    //     ]);

    //     $DBF = Pendaftaran::where('status', '!=', 'VERIFIED')->get('siswa_id');

    //     $IPA = Seleksi::whereIn('siswa_id', $Valid_IPA)->orderBy('point', 'DESC')->take($quota_ipa)->get();
    //     $IPS = Seleksi::whereIn('siswa_id', $Valid_IPS)->orderBy('point', 'DESC')->take($quota_ips)->get();
    //     $NT  = Seleksi::whereNotIn('siswa_id', $DBF)->whereIn('siswa_id', $NT_ID)->orderBy('status', 'ASC')->orderBy('point', 'DESC')->get();

    //     return view('Public.Seleksi.Ranking', compact('IPA','IPS','IPA_Rank','IPS_Rank','NT','NT_Rank','fitur'));
    // }
}
