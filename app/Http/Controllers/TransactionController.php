<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transactions = Transaction::all();
        return view('pages.transaction.index')->with([
            'transactions' => $transactions
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $items = Transaction::with('detail.product')->findOrFail($id);
        return view('pages.transaction.show')->with([
            'items' => $items
        ]);
    }

    public function edit($id)
    {
        $item = Transaction::findOrFail($id);
        return view('pages.transaction.edit',compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Transaction::findOrFail($id);
        $item->update($data);
        session()->flash('success','Data berhasil di update');
        return redirect()->route('transaction.index');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS,FAILED'
        ]);
        $item = Transaction::findOrFail($id);
        $item->transaction_status = $request->status;
        $item->save();

        return redirect()->route('transaction.index');
    }

    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        session()->flash('success','Data Berhasil di Hapus');
        return redirect()->route('transaction.index');
    }
}
