<?php

namespace App\Http\Controllers\Public\Seleksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Feature;
use App\Models\Quota;
use App\Models\Seleksi;
use App\Models\Siswa;

class SeleksiController extends Controller
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
        $uid     = auth()->user()->id;
        $daftar  = Pendaftaran::where('siswa_id', $uid)->get();
        $siswa   = Siswa::where('users_id', $uid)->get();
        $seleksi = Seleksi::where('siswa_id', $uid)->get();
        $fitur   = Feature::where('id', 2)->get();
    
        return view('Public.Seleksi.Seleksi', compact('seleksi','siswa','daftar','fitur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uid    = auth()->user()->id;
        $value  = Pendaftaran::where('siswa_id', $uid)->first();

        $nilai1  = random_int(60, 95);
        $nilai2  = random_int(60, 95);
        $nilai3  = random_int(60, 95);
        $nilai4  = random_int(60, 95);
        $nilai5  = random_int(60, 95);
        $nilai6  = random_int(60, 95);
        $nilai7  = random_int(60, 95);
        $nilai8  = random_int(60, 95);
        $nilai9  = random_int(60, 95);
        $nilai10 = random_int(60, 95);
        $nilai11 = random_int(60, 95);
        $nilai12 = random_int(60, 95);
        $nilai13 = random_int(60, 95);
        $nilai14 = random_int(60, 95);
        $nilai15 = random_int(60, 95);
        $nilai16 = random_int(60, 95);
        $nilai17 = random_int(60, 95);
        $nilai18 = random_int(60, 95);
        $nilai19 = random_int(60, 95);
        $nilai20 = random_int(60, 95);
        $nilai21 = random_int(60, 95);
        $nilai22 = random_int(60, 95);
        $nilai23 = random_int(60, 95);
        $nilai24 = random_int(60, 95);
        $nilai25 = random_int(60, 95);
        $nilai26 = random_int(60, 95);
        $nilai27 = random_int(60, 95);
        $nilai28 = random_int(60, 95);
        $nilai29 = random_int(60, 95);
        $nilai30 = random_int(60, 95);

        $ind1 = $nilai1;
        $ind2 = $nilai2;
        $ind3 = $nilai3;
        $ind4 = $nilai4;
        $ind5 = $nilai5;

        $mat1 = $nilai6;
        $mat2 = $nilai7;
        $mat3 = $nilai8;
        $mat4 = $nilai9;
        $mat5 = $nilai10;

        $ipa1 = $nilai11;
        $ipa2 = $nilai12;
        $ipa3 = $nilai13;
        $ipa4 = $nilai14;
        $ipa5 = $nilai15;

        $ing1 = $nilai16;
        $ing2 = $nilai17;
        $ing3 = $nilai18;
        $ing4 = $nilai19;
        $ing5 = $nilai20;

        $agm1 = $nilai21;
        $agm2 = $nilai22;
        $agm3 = $nilai23;
        $agm4 = $nilai24;
        $agm5 = $nilai25;

        $val_raport1 = $nilai26;
        $val_raport2 = $nilai27;
        $val_raport3 = $nilai28;
        $val_raport4 = $nilai29;
        $val_raport5 = $nilai30;

        $ind_avg = ($ind1+$ind2+$ind3+$ind4+$ind5)/5;
        $mat_avg = ($mat1+$mat2+$mat3+$mat4+$mat5)/5;  
        $ipa_avg = ($ipa1+$ipa2+$ipa3+$ipa4+$ipa5)/5; 
        $ing_avg = ($ing1+$ing2+$ing3+$ing4+$ing5)/5;
        $agm_avg = ($agm1+$agm2+$agm3+$agm4+$agm5)/5;

        $raport_avg  = ($val_raport1+$val_raport2+$val_raport3+$val_raport4+$val_raport5)/5;
        $subject_avg = ($ind_avg+$mat_avg+$ipa_avg+$ing_avg+$agm_avg)/5;

        $total_point = ($raport_avg+$subject_avg+$agm_avg);

        $postPendaftar = Pendaftaran::where('siswa_id', $uid)->update([

            'ind1'=>$ind1, 
            'ind2'=>$ind2, 
            'ind3'=>$ind3, 
            'ind4'=>$ind4, 
            'ind5'=>$ind5,

            'mat1'=>$mat1, 
            'mat2'=>$mat2, 
            'mat3'=>$mat3, 
            'mat4'=>$mat4, 
            'mat5'=>$mat5,

            'ipa1'=>$ipa1, 
            'ipa2'=>$ipa2, 
            'ipa3'=>$ipa3, 
            'ipa4'=>$ipa4, 
            'ipa5'=>$ipa5,

            'ing1'=>$ing1, 
            'ing2'=>$ing2, 
            'ing3'=>$ing3, 
            'ing4'=>$ing4, 
            'ing5'=>$ing5,

            'agm1'=>$agm1, 
            'agm2'=>$agm2, 
            'agm3'=>$agm3, 
            'agm4'=>$agm4, 
            'agm5'=>$agm5,

            'raport_avg'  => $raport_avg,
            'subject_avg' => $subject_avg,
            'agm_avg'     => $agm_avg,
            'point'       => $total_point,

            'raport1' => $val_raport1,
            'raport2' => $val_raport2,
            'raport3' => $val_raport3,
            'raport4' => $val_raport4,
            'raport5' => $val_raport5,

        ]);

        return redirect()->route('get.seleksi.finalisasi');
    }
    public function rank()
    {
        $fitur = Feature::where('id', 3)->get();
        $getquota = Quota::where('id', 1)->first();
        
        $quota = $getquota->quota;

        $rank = 1;
        
        $getEligibleID = Seleksi::where('status', '!=', 'RESIGN')
                        ->where('point', '!=', null)
                        ->orderBy('point', 'DESC')
                        ->take($quota)
                        ->get('siswa_id');
        
        $getNotEligibleID = Seleksi::where('status', '!=', 'RESIGN')
                            ->whereNotIn('siswa_id', $getEligibleID)
                            ->where('point', '!=', null)
                            ->get('siswa_id');

        $EligibleStatus = Seleksi::where('status', '!=', 'RESIGN')
                        ->whereIn('siswa_id', $getEligibleID)
                        ->update([
                            'status' => 'LOLOS',
                        ]);

        $NotEligibleStatus = Seleksi::where('status', '!=', 'RESIGN')
                            ->whereIn('siswa_id', $getNotEligibleID)
                            ->update([
                                'status' => 'TIDAK LOLOS',
                            ]);

        $Eligible = Seleksi::whereIn('siswa_id', $getEligibleID)->orderBy('point', 'DESC')->take($quota)->get('siswa_id');
        $NotEligible = Seleksi::whereIn('siswa_id', $getNotEligibleID)->orderBy('point', 'DESC')->get('siswa_id');

        $PASS = Seleksi::whereIn('siswa_id', $Eligible)->orderBy('point', 'DESC')->take($quota)->get();
        $NT = Seleksi::whereIn('siswa_id', $NotEligible)->orderBy('status', 'ASC')->orderBy('point', 'DESC')->get();

        return view('Public.Seleksi.Ranking', compact('PASS','NT','rank','fitur'));
    }
}
