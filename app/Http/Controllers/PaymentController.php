<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\Product;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
//     public function createPayment(Request $request)
//     {
//         // Konfigurasi Midtrans
//         Config::$serverKey = config('services.midtrans.server_key');
//         Config::$isProduction = config('services.midtrans.is_production');
//         Config::$isSanitized = true;
//         Config::$is3ds = true;

//         $user = Auth::user();

//         // Data transaksi
//         $transactionDetails = [
//             'order_id' => uniqid(),
//             'gross_amount' => $request->amount,
//         ];

//         $customerDetails = [
//             'first_name' => $user->name,
//             'email' => $user->email,
//             'phone' => $user->phone,
//             'address' => $user->address,
//         ];

//         $params = [ 
//             'transaction_details' => $transactionDetails,
//             'customer_details' => $customerDetails,
//         ];

//         // Buat Snap Token
//         $snapToken = Snap::getSnapToken($params);

//         // Kirim Snap Token ke view
//         return response()->json(['snapToken' => $snapToken]);
//     }

//     public function midtransCallback(Request $request)
// {
//     $serverKey = config('services.midtrans.server_key');
//     $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

//     if ($hashed != $request->signature_key) {
//         return response()->json(['message' => 'Invalid Signature'], 403);
//     }

//     // Cari transaksi berdasarkan order_id
//     $order = Order::where('id', $request->order_id)->first();

//     if (!$order) {
//         return response()->json(['message' => 'Order not found'], 404);
//     }

//     // Perbarui status pembayaran berdasarkan status dari Midtrans
//     if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
//         $order->status = 'paid';
//     } elseif ($request->transaction_status == 'pending') {
//         $order->status = 'pending';
//     } elseif ($request->transaction_status == 'expire' || $request->transaction_status == 'cancel') {
//         $order->status = 'failed';
//     }

//     $order->save(); 

//     CartItem::session($order->user_id)->clear();

//     // Kirim notifikasi ke admin (opsional: bisa pakai email atau database notification)
//     // Notification::send(Admin::all(), new OrderPaidNotification($order));

//     return response()->json(['message' => 'Payment status updated successfully']);
// }

//     public function saveOrder(Request $request)
//     {
//         try {
//             $userid = Auth::id();
//             $cart = CartItem::where('user_id', $userid)->with('product')->get();

//             if ($cart->isEmpty()) {
//                 return response()->json(['error' => 'Keranjang belanja kosong!'], 400);
//             }

//             // Log untuk debugging
//             Log::info('Starting save order process', [
//                 'user_id' => $userid,
//                 'cart_items' => $cart->count()
//             ]);

//             // Hitung total pembayaran
//             $totalAmount = $cart->sum(fn($item) => $item->product->price * $item->quantity);

//             // Simpan order baru
//             $order = new Order();
//             $order->user_id = $userid;
//             $order->recipient_name = $request->name;
//             $order->recipient_address = $request->address;
//             $order->recipient_phone = $request->phone;
//             $order->amount = $totalAmount;
//             $order->status = "Pending"; // Status default sebelum admin konfirmasi
//             $order->save();

//             // Simpan detail produk dalam tabel order_items
//             foreach ($cart as $cartItem) {
//                 OrderItem::create([
//                     'order_id' => $order->id,
//                     'product_id' => $cartItem->product_id,
//                     'quantity' => $cartItem->quantity,
//                     'price' => $cartItem->product->price
//                 ]);

//                 // Update stok produk
//                 $product = Product::find($cartItem->product_id);
//                 $product->quantity -= $cartItem->quantity;
//                 $product->save();
//             }

//             // Hapus item dari keranjang setelah berhasil checkout
//             CartItem::where('user_id', $userid)->delete();

//             return response()->json([
//                 'status' => 'success',
//                 'message' => 'Order berhasil disimpan',
//                 'order_id' => $order->id
//             ]);

//         } catch (\Exception $e) {
//             Log::error('Save order failed', [
//                 'error' => $e->getMessage(),
//                 'trace' => $e->getTraceAsString()
//             ]);
//             return response()->json(['error' => 'Terjadi kesalahan saat menyimpan pesanan!'], 500);
//         }
//     }


}