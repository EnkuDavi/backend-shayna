<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $income = Transaction::where('transaction_status','SUCCESS')->sum('transaction_total');
        $sales = Transaction::count();
        $items = Transaction::orderBy('id','DESC')->take(7)->get();
        $pie = [
            'pending' => Transaction::where('transaction_status','PENDING')->count(),
            'success' => Transaction::where('transaction_status','SUCCESS')->count(),
            'failed' => Transaction::where('transaction_status','FAILED')->count(),
        ];
        return view('pages.dashboard', compact('income','sales','items','pie'));
    }
}
