<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ProductAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'showRekom']);

Route::get('/about', function () {
    return view('about');
});
Route::get('/kategori', function () {
    return view('kategori');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/search', [ProductController::class, 'search'])->name('search');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/products', action: [ProductAdminController::class, 'index'])->name('admin.products.index');
    Route::get('/detail/{id}', [ProductController::class, 'show'])->name('detail.show');
    Route::get('menu', [ProductController::class, 'index'])->name('menu');
    Route::get('/cake', [ProductController::class, 'showCake'])->name('cake');
    Route::get('/donat', [ProductController::class, 'showDonat'])->name('donat');
    Route::get('/roti', [ProductController::class, 'showRoti'])->name('roti');
    Route::get('/allcake', [ProductController::class, 'showAll'])->name('all');
    
    Route::get('/cart', [ProductController::class, 'viewCart'])->name('cart.index');
    Route::post('/cart/update/{id}', [ProductController::class, 'updateCartQuantity'])->name('cart.update');
    Route::post('/cart/delete-selected', [ProductController::class, 'deleteSelected'])->name('cart.deleteSelected');
    Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');

    Route::post('/checkout', [ProductController::class, 'checkout'])->name('pay');
    Route::post('/pay', [ProductController::class, 'store'])->name('pay.store');
    Route::post('/checkout/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::post('/midtrans/callback', [PaymentController::class, 'midtransCallback'])->name('midtrans.callback');
    Route::post('/payment/save', [PaymentController::class, 'saveOrder'])->name('payment.save');
    Route::post('/payment/create', [PaymentController::class, 'createPayment'])->name('payment.create');
    Route::post('/payment/cancel', [ProductController::class, 'cancelOrder'])->name('order.cancel');


    Route::get('/kecamatans', [KecamatanController::class, 'index']);
    
    Route::post('/profile/{id}/received', [ProfileController::class, 'diterima'])->name('pesanan.diterima');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/pesanan', [ProfileController::class, 'pesanan'])->name('profile.pesanan');
    Route::get('/profile/riwayat', [ProfileController::class, 'riwayat'])->name('profile.riwayat');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';