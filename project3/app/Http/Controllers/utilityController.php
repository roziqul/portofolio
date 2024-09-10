<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountActivationRequest;
use App\Http\Requests\AccountDeactivationRequest;
use App\Models\Reserved;
use App\Models\User;
use Illuminate\Http\Request;

class utilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function importStudent()
    {

    }

    public function updateSchoolInfo()
    {

    }

    public function studentAccountActivation(AccountActivationRequest $request)
    {
        $condition = $request->condition;

        if ($condition == 'register') {

            $validated = $request->validated();
            $validated['activated_by'] = auth()->user()->id;        
            $user = User::create($validated);

        } elseif ($condition == 'reactivate') {

            $validated['activated_by'] = auth()->user()->id;
            $validated['deactivated_by'] = null;      
            $userEmail = $request->email;

            $user = User::where('email', $userEmail)->update([
            'deactivated_by'  => null,
            'activated_by' => auth()->user()->id, 
            'status' => 'active'
        ]);

        }
        
        return redirect(route('student.index'))->with('Success', 'Berhasil aktivasi akun siswa !');
    }

    public function studentAccountDeactivation(Request $request)
    {
        $userEmail = $request->email;

        $user = User::where('email', $userEmail)->update([
            'deactivated_by'  => auth()->user()->id, 
            'activated_by' => null,
            'status' => 'nonactive'
        ]);

        return redirect(route('student.index'))->with('Success', 'Berhasil deaktivasi akun siswa !');
    }

    public function administratorAccountActivation(AccountActivationRequest $request)
    {
        $condition = $request->condition;

        if ($condition == 'register') {

            $validated = $request->validated();
            $validated['activated_by'] = auth()->user()->id;        
            $user = User::create($validated);

        } elseif ($condition == 'reactivate') {

            $validated['activated_by'] = auth()->user()->id;
            $validated['deactivated_by'] = null;      
            $userEmail = $request->email;

            $user = User::where('email', $userEmail)->update([
                'deactivated_by'  => null,
                'activated_by' => auth()->user()->id, 
                'status' => 'active'
            ]);
        }
        
        return redirect(route('administrator-data.index'))->with('Success', 'Berhasil aktivasi akun administrator !');
    }

    public function administratorAccountDeactivation(Request $request)
    {     
        $userEmail = $request->email;

        $user = User::where('email', $userEmail)->update([
            'deactivated_by'  => auth()->user()->id, 
            'activated_by' => null,
            'status' => 'nonactive'
        ]);
        
        return redirect(route('administrator-data.index'))->with('Success', 'Berhasil deaktivasi akun administrator !');
    }

    public function submitMissingBook(Request $request)
    {
        $catalogId = $request->catalog_id;

        $reserved = Reserved::where('catalog_id');
    }

    public function indexMissingBook()
    {
        
    }

    public function viewMissingBook()
    {

    }

    public function verifyMissingBook()
    {

    }

    public function showProfile(Request $request)
    {

    }

}
