<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TypeProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// ----------------- TRANG CHU ---------------
Route::get('/', [PageController::class , 'getIndex']);
Route::get('/type/{id}', [PageController::class , 'getLoaiSp']);

Route::get('/detail/{id}', [PageController::class, 'getDetail']);


Route::get('/contact', [PageController::class , 'getContact']);
Route::get('/about', [PageController::class , 'getAbout']);


//---------------- CART ---------------
Route::get('add-to-cart/{id}', [PageController::class, 'getAddToCart'])->name('themgiohang');
Route::get('del-cart/{id}', [PageController::class, 'getDelItemCart'])->name('xoagiohang');

//------------------------- Login, Logout, Register ---------------------------------//
Route::get('/register', function () {
    return view('users.register');
});

Route::post('/register', [UserController::class, 'Register']);

Route::get('/login', function () {
    return view('users.login');
});

Route::get('/logout', [UserController::class, 'Logout']);
Route::post('/login', [UserController::class, 'Login']);

															
	// ----------------- CHECKOUT ---------------														
Route::get('check-out', [PageController::class, 'getCheckout'])->name('dathang');														
Route::post('check-out', [PageController::class, 'postCheckout'])->name('dathang');														
// ---------------- Payment with VNPAY
Route::get('/return-vnpay', function () {					
 return view('vnpay.return-vnpay');
});					

Route::get('/vnpay-index',function(){return view('vnpay-index');});//Route xử lý nút Xác nhận thanh toán trên trang checkout.blade.php
Route::post('/vnpay/create_payment',[PageController::class,'createPayment'])->name('postCreatePayment');//Route để gán cho key "vnp_ReturnUrl" ở bước 6
Route::get('/vnpay_return',[PageController::class,'vnpayReturn'])->name('vnpayReturn');

// SendEmail
Route::get('/input-email',[PageController::class,'getInputEmail'])->name('getInputEmail');
Route::post('/input-email',[PageController::class,'postInputEmail'])->name('postInputEmail');

// ----------------- TRANG ADMIN --------------- \\


// Slide Management
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin/slides',
    // 'middleware' => ['auth']
], function () {
    Route::get('/create', [SlideController::class, 'create']);
    Route::post('/create', [SlideController::class, 'store']);
    Route::get('/update/{id}', [SlideController::class, "edit"]);
    Route::post('/update/{id}', [SlideController::class, "update"]);
    Route::get('/delete/{id}', [SlideController::class, "delete"]);
    Route::get('/', [SlideController::class, "index"])->name('slides.index');
});

// Type Product Management
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin/typeProducts',
    // 'middleware' => ['auth']
], function () {
    Route::get('/create', [TypeProductController::class, 'create']);
    Route::post('/create', [TypeProductController::class, 'store']);
    Route::get('/update/{id}', [TypeProductController::class, "edit"]);
    Route::post('/update/{id}', [TypeProductController::class, "update"]);
    Route::get('/delete/{id}', [TypeProductController::class, "delete"]);
    Route::get('/', [TypeProductController::class, "index"])->name('typeProducts.index');
});

// Product Management
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin/products',
    // 'middleware' => ['auth']
], function () {
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::get('/update/{id}', [ProductController::class, "edit"]);
    Route::post('/update/{id}', [ProductController::class, "update"]);
    Route::get('/delete/{id}', [ProductController::class, "delete"]);
    Route::get('/', [ProductController::class, "index"])->name('products.index');
});

// Bill Management
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin/bills',
    // 'middleware' => ['auth']
], function () {
    Route::get('/', [BillController::class, "index"])->name('bills.index');
});


//------------------------- Login, Logout, Register ---------------------------------//
// Route::get('/register', function () {
//     return view('users.register');
// });

// Route::get('/login', function () {
//     return view('admin.login.index');
// });














// Route::get('/', function () 
// {
//     $data = DB::table('customers')->get();
//     print_r($data);
// });
// Route::get('/', function () 
// {
//     $data =DB::table('customers')->orderBy('name','desc')->get();
//     print_r($data);
// });
// Route::get('/', function () 
// {
//     $data =DB::table('customers')->find(3);
//     print_r($data);
// });
// Route::get('/', function () 
// {
//     $data =DB::table('customers')->select('name', 'email')->get();
//     print_r($data);
// });
// Route::get('/', function () 
// {
//     $data =DB::table('customers')->distinct()->get();
//     print_r($data);
// });


