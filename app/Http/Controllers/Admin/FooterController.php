<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    /**
     * Menampilkan halaman pengaturan footer.
     */
    public function index()
    {
        // Ambil data footer terbaru
        $footer = Footer::latest()->first();

        return view('admin.setting.footer', compact('footer'));
    }

    /**
     * Menyimpan atau memperbarui data footer.
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi_toko' => 'nullable|string',
            'email_toko' => 'nullable|email',
            'nomor_toko' => 'nullable|string|max:20',
            'alamat_toko' => 'nullable|string|max:255',
            'kota' => 'nullable|string|max:255',    
            'link_instagram' => 'nullable|url',
            'link_youtube' => 'nullable|url',
            'link_facebook' => 'nullable|url',
        ]);

        // Ambil data footer terakhir, atau buat baru jika belum ada
        $footer = Footer::latest()->first();

        if ($footer) {
            // Update data footer
            $footer->update($request->all());
        } else {
            // Buat data footer baru
            Footer::create($request->all());
        }

        return redirect()->back()->with('success', 'Footer berhasil diperbarui.');
    }
}
