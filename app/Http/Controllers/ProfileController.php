<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);
        
        $user = Auth::user();
        
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
        ]);    

        // $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function pesanan()
    {
        $orders = Order::whereNotIn('status', ['received'])->get();
        
        $user = Auth::user();
        $orders = Order::with('product')-> where('user_id', $user->id)->get();
        return view('profile.pesanan', compact('orders'));
    }
    public function riwayat()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->where('status', 'received')
        ->get();

        return view('profile.riwayat', compact('orders'));
    }
    public function pembayaran()
    {
        // Logika untuk menampilkan halaman pembayaran
        return view('profile.pembayaran');
    }
    public function bantuan()
    {
        // Logika untuk menampilkan halaman bantuan
        return view('profile.bantuan');
    }
    public function diterima($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status === 'shipped') {
            $order->status = 'received'; // Ubah status jadi diterima
            $order->save();

            return redirect()->back()->with('success', 'Pesanan telah diterima!');
        }

        return redirect()->back()->with('error', 'Pesanan tidak valid atau tidak bisa diperbarui.');
    }

    // public function upload(Request $request)
    // {
    //     // Validasi file yang diunggah
    //     $request->validate([
    //         'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     // Ambil user saat ini
    //     $user = Auth::user();

    //     // Cek apakah user sudah punya foto lama
    //     if ($user->profile_picture) {
    //         // Hapus file lama dari storage jika ada
    //         Storage::delete($user->profile_picture);
    //     }

    //     // Simpan file baru
    //     $path = $request->file('profile_picture')->store('profile_pictures', 'public');        
    //     // Update jalur file di database
    //     $user->profile_picture = $path;
    //     $user->save();

    //     return back()->with('success', 'Foto profil berhasil diperbarui!');
    // }

}
