<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Missing;
use App\Models\Reserved;
use App\Models\Serial;
use App\Models\User;

class dashboardController extends Controller
{
    public function index()
    {
        $included = ['catalog','catalog.student'];

        $countReserved = Serial::where('status', 'loaned')->count();
        $countCategory = Category::count();
        $countUser = User::where('role', 'student')->count();
        $countFine = Reserved::where('bill_status', 'not_paid')->sum('total_bill');

        $waitingApproval = Missing::where('status', 'waiting_approval')->get();
        $waitingPayments = Reserved::with($included)->where('rsv_status', 'not_done')->get();

        $data = [
            'countReserved' => $countReserved,
            'countCategory' => $countCategory,
            'countUser' => $countUser,
            'countFine' => $countFine,
            'waitingApproval' => $waitingApproval,
            'waitingPayments' => $waitingPayments,
            'no' => 1
        ];

        return view('dashboard.index', $data);
    }
}
