<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::with(['user','food'])->paginate(10);

        return view('transaction.index', ['items' => $transaction]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Transaction $transaction)
    {
        return view('transaction.detail', ['item' => $transaction]);
    }

    public function edit(Transaction $transaction)
    {

    }

    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return back();
    }

    public function changeStatus(Transaction $transaction, $id, $status)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update(['status' => $status]);
        return back();
    }
}
