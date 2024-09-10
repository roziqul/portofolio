<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Ortu;
use App\Models\Archieve;
use App\Models\Feature;
use App\Models\psb;

class PendataanController extends Controller
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
        $cond4  = 'REJECTED';
        $filter = $request->input('filter');

        $notverified = Siswa::where('status', $cond1)->get('id');
        $waiting     = Siswa::where('status', $cond2)->get('id');
        $verified    = Siswa::where('status', $cond3)->get('id');
        $rejected    = Siswa::where('status', $cond4)->get('id');
    
        switch ($filter) {
            case 'option1': //ALL DATA
                $filteredData = Siswa::whereIn('id', $verified)->orWhereIn('id', $waiting)->orWhereIn('id', $rejected)->orderBy('status', 'ASC')->orderBy('updated_at', 'ASC')->get();
                break;
            case 'option2': //WAITING VERIFICATION
                $filteredData = Siswa::whereIn('id', $waiting)->orderBy('updated_at', 'ASC')->get();
                break;
            case 'option3': //VERIFIED
                $filteredData = Siswa::whereIn('id', $verified)->orderBy('updated_at', 'ASC')->get();
                break;
            case 'option4': //REJECTED
                $filteredData = Siswa::whereIn('id', $rejected)->orderBy('updated_at', 'ASC')->get();
                break;
            default :
                $filteredData = Siswa::whereIn('id', $verified)->orWhereIn('id', $waiting)->orWhereIn('id', $rejected)->orderBy('status', 'ASC')->orderBy('updated_at', 'ASC')->get();
                break;
        }
        return view('Admin.Pendataan.Index', compact('filteredData','no'));

    }

    public function get($id)
    {
        $siswa  = Siswa::where('users_id', $id)->get();
        $psb    = psb::where('siswa_id', $id)->get();
        $ortu   = Ortu::where('siswa_id', $id)->get();
        $archieve = Archieve::where('siswa_id', $id)->get();
        $fitur  = Feature::where('id', 1)->get();
        $user   = User::where('id', $id)->get();
    
        return view('Admin.Pendataan.Show', compact('siswa','psb','ortu','archieve','fitur','user'));
    }

    public function post(Request $request)
    {
        $id     = $request->id;
        $status = $request->status;
        $note   = $request->note;
        $auth   = auth()->user()->username;

        if ($status == 'VERIFIED') {
            $post = Siswa::where('id', $id)->update([
                'status'      => $status,
                'verified_by' => $auth,
                'note'        => null,
            ]);
        } else {
            $post = Siswa::where('id', $id)->update([
                'status'      => $status,
                'verified_by' => $auth,
                'note'        => $note,
            ]);
        }

        return redirect()->route('filterPendataan');
    }
}
