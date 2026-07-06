<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\CartItem;

class ProductController extends Controller
{
    // User hanya bisa melihat daftar produk
    public function index()
    {
        $products = Product::all();
        return view('menu', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('detail', compact('product'));
    }

    public function showCake()
    {
        $products = Product::where('kategory', 'cake')->get();
        return view('cake', compact('products'));
    }

    public function showDonat()
    {
        $products = Product::where('kategory', 'donat')->get();
        return view('donat', compact('products'));
    }

    public function showRoti()
    {
        $products = Product::where('kategory', 'roti')->get();
        return view('roti', compact('products'));
    }

    public function showAll()
    {
        $products = Product::all();

        return view('all', compact('products'));
    }

    public function showRekom()
    {
        $products = Product::where('kategory', 'rekomendasi')->get();
        return view('welcome', compact('products'));
    }

    public function addToCart(Request $request)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk menambahkan produk ke keranjang.');
        }

        // Validasi input dari request
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $userId = $user->id;
        $productId = $request->input('product_id'); 
        $quantity = $request->input('quantity');

        // Dapatkan data produk dari database
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $stock = $product->stock; // Asumsikan kolom stok di tabel products bernama 'stock'

        // Cari item di keranjang
        $cartItems = CartItem::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($cartItems) {
            // Total quantity = quantity di keranjang + quantity baru yang ditambahkan
            $totalQuantity = $cartItems->quantity + $quantity;

            // Jika total quantity melebihi stok, tampilkan pesan error
            if ($totalQuantity > $stock) {
                return redirect()->back()->with('error', 'habis, batas maksimum ' . ($stock - $cartItems->quantity));
            }

            // Jika total quantity tidak melebihi stok, perbarui quantity di keranjang
            $cartItems->quantity = $totalQuantity;
            $cartItems->save();
        } else {
            // Jika produk belum ada di keranjang, periksa apakah quantity yang diminta melebihi stok
            if ($quantity > $stock) {
                return redirect()->back()->with('error', 'Jumlah produk yang ditambahkan melebihi stok yang tersedia.');
            }

            // Buat entri keranjang baru
            CartItem::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        session()->put('cart', array_merge(session('cart', []), [
            $productId => [
                'id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
                'description' => $product->description,
            ],
        ]));

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function viewCart()
    {
        if (Auth::check()) {
            $cart = CartItem::where('user_id', Auth::id())
                ->with('product')
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->product_id,
                        'name' => $item->product->name,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price,
                        'description' => $item->product->description,
                        'image' => $item->product->image,
                    ];
                });
        } else {
            $cart = session()->get('cart', []);
        }

        return view('cart.index', compact('cart'));
    }

    public function removeFromCart($id)
    {
        if (Auth::check()) {
            // Hapus item dari tabel cart_items
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->delete();
        } else {

            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function checkout(Request $request)
    {
        $cartItems = session('cart', []);

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong!');
        }

        // Ambil produk terpilih dari request
        $selectedItems = json_decode($request->input('selected_items'), true);
        if (!empty($selectedProductIds)) {
            $cartItems = collect($cartItems)->filter(function ($item) use ($selectedProductIds) {
                return in_array($item['id'], $selectedProductIds);
            })->map(function ($item) use ($selectedItems) {
                $selectedItem = collect($selectedItems)->firstWhere('id', $item['id']);
                $item['quantity'] = (int) ($selectedItem['quantity'] ?? $item['quantity']);
                $item['price'] = (float) $item['price'];
                return $item;
            })->toArray();
        }

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Tidak ada produk yang dipilih.');
        }

        // Subtotal, diskon, dan ongkir
        $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartItems));
        $diskon = 0.1 * $subtotal;
        $ongkir = 5000;
        $total = $subtotal - $diskon + $ongkir;

        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->latest()->first();

        session([
            'payment_data' => [
                'cartItems' => $cartItems,
                'subtotal' => $subtotal,
                'diskon' => $diskon,
                'ongkir' => $ongkir,
                'total' => $total,
                'user' => $user,
                'order' => $order,
            ],
        ]);

        session()->forget('cart');
        CartItem::where('user_id', $user->id)->delete();

        return view('pay', compact('cartItems', 'subtotal', 'diskon', 'ongkir', 'total', 'user', 'order'))->with('success', 'Transaksi berhasil! Keranjang Anda telah dikosongkan.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|array',
            'recipient_name' => 'required|string|max:255',
            'recipient_address' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:15',
            'payment_proof' => 'required|image|:png,jpg,jpeg|max:2048',
        ]);

        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

        foreach ($request->product_id as $productId) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'status' => 'pending',
                'amount' => $request->total,
                'recipient_name' => $request->recipient_name,
                'recipient_address' => $request->recipient_address,
                'recipient_phone' => $request->recipient_phone,
                'payment_proof' => $paymentProofPath,
            ]);
        }

        foreach ($request->product_id as $productId) {
            $cart = CartItem::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();

            if ($cart) {
                $order->orderItems()->create([
                    'product_id' => $productId,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                ]);

                // Hapus item dari keranjang
                $cart->delete();
            }
        }

        return redirect()->route('cart.index')->with('success', 'Bukti pembayaran berhasil diunggah, transaksi akan segera diproses.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

        return view('search_results', compact('products', 'query'));
    }

    public function updateCartQuantity(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        if (Auth::check()) {
            $cartItem = CartItem::where('user_id', Auth::id())->where('product_id', $id)->first();
            if ($cartItem) {
                $cartItem->quantity = $request->quantity;
                $cartItem->save();
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
            }
        }

        return response()->json(['success' => true]);
    }

    public function deleteSelected(Request $request)
    {
        $request->validate(['product_ids' => 'required|array']);

        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())
                ->whereIn('product_id', $request->product_ids)
                ->delete();
        } else {
            $cart = session()->get('cart', []);
            foreach ($request->product_ids as $id) {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }

    public function cancelOrder()
{
    if (Auth::check()) {
        $user = Auth::user();

        // Ambil pesanan pengguna yang sedang dalam proses
        $order = Order::where('user_id', $user->id)->where('status', 'pending')->first();

        if ($order) {
            // Ambil item yang ada di pesanan
            $orderItems = OrderItem::where('order_id', $order->id)->get();

            foreach ($orderItems as $item) {
                // Kembalikan produk ke keranjang pengguna
                CartItem::updateOrCreate(
                    ['user_id' => $user->id, 'product_id' => $item->product_id],
                    ['quantity' => DB::raw('quantity + ' . $item->quantity)]
                );
            }

            // Hapus pesanan yang sedang dalam proses
            OrderItem::where('order_id', $order->id)->delete();
            $order->delete();
        }
    } else {
        // Untuk pengguna tamu, kembalikan produk ke session cart
        $cart = session()->get('cart', []);
        $checkoutItems = session()->get('checkout_items', []);

        foreach ($checkoutItems as $item) {
            $cart[$item['id']] = $item;
        }

        session()->put('cart', $cart);
        session()->forget('checkout_items');
    }

    return redirect()->route('cart.index')->with('success', 'Pesanan dibatalkan, produk kembali ke keranjang.');
}

}
