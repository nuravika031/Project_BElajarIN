<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_kursus' => 'required|exists:courses,id',
            'jumlah' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            Transaction::create([
                'id_pengguna' => Auth::id(),
                'id_kursus' => $request->id_kursus,
                'jumlah' => $request->jumlah,
                'status_pembayaran' => 'Menunggu',
            ]);
        });

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dibuat.');
    }

    public function index()
    {
        $transactions = Transaction::where('id_pengguna', Auth::id())->get();
        return view('transactions.index', compact('transactions'));
    }
}

