<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // $transactions = Order::with('product')
        //                     ->where('status', 'paid')  // Hanya transaksi yang sudah dibayar
        //                     ->get();
        $transactions = Order::with('user')
                        ->where('status', '!=', 'rejected')
                        ->get();
                        
        return view('admin.transactions.index', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Order::findOrFail($id);

        // Kirim data transaksi ke view
        return view('checkout', compact('transaction'));
    }

    public function uploadProof(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $transaction = Order::findOrFail($id);

        if ($request->hasFile('payment_proof')) {
            $imagePath = $request->file('payment_proof')->store('public/payment_proofs');
            $transaction->payment_proof = $imagePath;
            $transaction->status = 'pending';
            $transaction->save();
        }

        return back()->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    public function updateStatus(Request $request, $id, $status)
    {
        $transaction = Order::findOrFail($id);

        $transaction->status = $status;
        $transaction->save();

        $message = match($status) {
            'approved' => 'Pesanan telah disetujui!',
            'rejected' => 'Pesanan telah ditolak!',
            'shipped' => 'Pesanan telah dikirim!',
            default => 'Status pesanan diperbarui!',
        };

        return redirect()->route('admin.transactions.index')->with('success', $message);
    }
}
