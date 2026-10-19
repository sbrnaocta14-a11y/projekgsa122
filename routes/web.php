
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\latihancontroller;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;

use App\Services\CoffeeNewsService;
use App\Models\News;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', function (CoffeeNewsService $coffeeNews) {
    $news = $coffeeNews->getNews(2);

    $manualNews = News::where('show_on_home', true)
        ->latest()
        ->get();

    return view('home', compact('news', 'manualNews'));
})->name('home');

/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'register'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [AuthController::class, 'registerProcess'])
    ->middleware('guest');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'loginProcess'])
    ->middleware('guest');

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| COFFEE SHOP / PRODUCT CATALOG
|--------------------------------------------------------------------------
|
| Admin dan customer yang sudah login bisa melihat katalog.
| Halaman ini bukan halaman CRUD admin.
|
*/

Route::get('/shop', [ShopController::class, 'index'])
    ->middleware('auth')
    ->name('shop.index');

/*
|--------------------------------------------------------------------------
| PRODUCT MANAGEMENT - ADMIN ONLY
|--------------------------------------------------------------------------
|
| Hanya admin yang bisa menambah, mengedit, dan menghapus produk.
| GET /product menampilkan halaman pengelolaan produk admin.
|
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/product', [productcontroller::class, 'product'])
        ->name('product.index');

    Route::get('/product/create', [productcontroller::class, 'create'])
        ->name('product.create');

    Route::post('/product', [productcontroller::class, 'store'])
        ->name('product.store');

    Route::get('/product/{product}/edit', [productcontroller::class, 'edit'])
        ->name('product.edit');

    Route::put('/product/{product}', [productcontroller::class, 'update'])
        ->name('product.update');

    Route::delete('/product/{product}', [productcontroller::class, 'destroy'])
        ->name('product.destroy');
});

/*
|--------------------------------------------------------------------------
| CUSTOMER SHOPPING - CUSTOMER ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:customer'])->group(function () {

    // Keranjang belanja
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::patch('/cart/{product}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/{product}', [CartController::class, 'remove'])
        ->name('cart.remove');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');

    // Pesanan milik customer
    Route::get('/my-orders', [OrderController::class, 'index'])
        ->name('orders.mine');

    Route::get('/my-orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');

    Route::post('/my-orders/{order}/payment-proof',
        [OrderController::class, 'uploadProof'])
        ->name('orders.proof');
});

/*
|--------------------------------------------------------------------------
| ORDER MANAGEMENT - ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('orders.index');

        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])
            ->name('orders.show');

        Route::patch('/orders/{order}/payment',
            [AdminOrderController::class, 'updatePayment'])
            ->name('orders.payment');

        Route::get('/orders/{order}/payment-proof',
            [AdminOrderController::class, 'paymentProof'])
            ->name('orders.proof');
    });

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::get('/profile', [AuthController::class, 'profile'])
    ->middleware('auth')
    ->name('profile');

Route::put('/profile', [AuthController::class, 'updateProfile'])
    ->middleware('auth')
    ->name('profile.update');

Route::delete('/profile', [AuthController::class, 'deleteAccount'])
    ->middleware('auth')
    ->name('profile.delete');

Route::post('/profile/photo/delete',
    [AuthController::class, 'deleteProfilePhoto'])
    ->middleware('auth')
    ->name('profile.photo.delete');

/*
|--------------------------------------------------------------------------
| SETTINGS
|--------------------------------------------------------------------------
*/

Route::get('/settings', function () {
    return view('settings');
})->middleware('auth')->name('settings');

/*
|--------------------------------------------------------------------------
| LATIHAN
|--------------------------------------------------------------------------
*/

Route::get('/latihan', [latihancontroller::class, 'latihan'])
    ->name('latihan');

/*
|--------------------------------------------------------------------------
| ABOUT / COFFEE NEWS
|--------------------------------------------------------------------------
*/

Route::get('/about', [AboutController::class, 'index'])
    ->name('about');

/*
|--------------------------------------------------------------------------
| MANUAL COFFEE NEWS
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])
        ->name('news.create');

    Route::post('/news', [NewsController::class, 'store'])
        ->name('news.store');

    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])
        ->name('news.edit');

    Route::put('/news/{news}', [NewsController::class, 'update'])
        ->name('news.update');

    Route::delete('/news/{news}', [NewsController::class, 'destroy'])
        ->name('news.destroy');
});
