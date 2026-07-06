<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ProductAdminController extends Controller
{

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
            'kategory' => 'required|string',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->kategory = $request->kategory;

        // Jika ada file gambar, simpan gambar ke storage
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // Simpan produk
        $product->save();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }


    // Tampilkan semua produk (hanya untuk admin)
    public function index()
    {
        $products = Product::all();
        
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    
    public function edit($id)
    {
        $product = Product::findOrFail($id); 
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            // Cari produk berdasarkan ID
            $product = Product::findOrFail($id);
    
            // Jika ada file gambar baru yang diunggah
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($product->image && file_exists(storage_path('app/public/' . $product->image))) {
                    unlink(storage_path('app/public/' . $product->image));
                }
    
                // Simpan gambar baru ke folder 'products' di storage
                $imagePath = $request->file('image')->store('products', 'public');
                $product->image = $imagePath;
            }
    
            // Update data produk lainnya
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->stock = $request->input('stock');
            $product->save();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            // Tangani error jika terjadi
            return redirect()->back()->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }

    public function showCategory($kategory)
    {
        // Ambil produk berdasarkan kategori yang diberikan
        $products = Product::where('kategory', $kategory)->get();

        // Tampilkan view dan kirim data produk
        return view('category', compact('products', 'kategory'));
    }

    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($id);

        // Periksa apakah produk ada
        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Produk tidak ditemukan.');
        }

        // Hapus produk dari database
        $product->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

}
