<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;


class AdminController extends Controller
{
    public function dashboard ()
    {
        $userCount = User::count();
        $productCount = Product::count();
        $orderCount = Order::count();

        return view('admin.dashboard', compact('userCount', 'productCount','orderCount'));
    }

    public function admin ()
    {
        $admin = Admin::all();

        return view('admin.admin.index', compact('admin'));
    }

    public function destroyAdmin ($id)
    {
        $admin = admin::find($id);

        if($admin) {
            $admin->delete();
            return redirect()->route('admin.admin.index')->with('success', 'admin Berhasil dihapus');
        }
        return redirect()->route('admin.admin.index')->with('error', 'admin tidak ditemukan');
    }
    
    public function pengguna ()
    {
        $user = User::all();

        return view('admin.user.pengguna', compact('user'));
    }

    
    public function destroy ($id)
    {
        $user = User::find($id);

        if($user) {
            $user->delete();
            return redirect()->route('admin.user.pengguna')->with('success', 'Pengguna Berhasil dihapus');
        }
        return redirect()->route('admin.user.pengguna')->with('error', 'Pengguna tidak ditemukan');
    }

}
