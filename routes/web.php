<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SpiceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ログイン画面
Route::get('/', [UserController::class, 'showLogin'])->name('showLogin');

// 新規ユーザー登録画面
Route::get('/account', [UserController::class, 'showAccount'])->name('showAccount');

// 新規ユーザー登録内容確認画面
Route::post('/userConfirm', [UserController::class, 'showUserConfirm'])->name('showUserConfirm');

// 新規ユーザー登録完了画面
Route::post('/userComplete', [UserController::class, 'showUserComplete'])->name('showUserComplete');

// トップ画面
Route::post('/topPage', [TopController::class, 'showTopPage'])->name('showTopPage');
Route::get('/topPage', [TopController::class, 'showTopPage'])->name('showTopPage');


// // ログイン画面
// Route::get('/', [TopController::class, 'showLogin'])->name('showLogin');
// Route::post('/', [TopController::class, 'register'])->name('register');

// // ログイン処理
// Route::post('/players/index', [TopController::class, 'login'])->name('login');

// // ログアウト処理
// Route::post('/', [TopController::class, 'logout'])->name('logout');

// スパイス一覧画面
Route::get('/spice', [SpiceController::class, 'showSpice'])->name('showSpice');
Route::post('/spice', [SpiceController::class, 'showSpice'])->name('showSpice');

// スパイス詳細画面
Route::get('/spiceDetail', [SpiceController::class, 'showSpiceDetail'])->name('showSpiceDetail');
Route::post('/spiceDetail', [SpiceController::class, 'showSpiceDetail'])->name('showSpiceDetail');


// 店舗一覧画面
Route::get('/store', [SpiceController::class, 'showStore'])->name('showStore');
Route::post('/store', [SpiceController::class, 'showStore'])->name('showStore');

// 店舗詳細画面
Route::get('/storeDetail', [SpiceController::class, 'showStoreDetail'])->name('showStoreDetail');
Route::post('/storeDetail', [SpiceController::class, 'showStoreDetail'])->name('showStoreDetail');

// 新規店舗登録画面
Route::get('/storeRegister', [StoreController::class, 'showStoreRegister'])->name('showStoreRegister');

// 写真アップロード
Route::resource('upload',StoreController::class);

// 新規店舗登録内容確認画面
Route::post('/storeConfirm', [StoreController::class, 'showStoreConfirm'])->name('showStoreConfirm');

// 新規店舗登録完了画面
Route::post('/storeComplete', [StoreController::class, 'showStoreComplete'])->name('showStoreComplete');


// 新規商品Menu登録画面
Route::get('/account', [UserController::class, 'showAccount'])->name('showAccount');

// 新規商品Menu登録内容確認画面
Route::post('/userConfirm', [UserController::class, 'showUserConfirm'])->name('showUserConfirm');

// 新規商品Menu登録完了画面
Route::post('/userComplete', [UserController::class, 'showUserComplete'])->name('showUserComplete');


// 商品一覧画面
Route::get('/product', [ProductController::class, 'showProduct'])->name('showProduct');
Route::post('/product', [ProductController::class, 'showProduct'])->name('showProduct');

// 商品詳細画面
Route::get('/productDetail', [ProductController::class, 'showProductDetail'])->name('showProductDetail');
Route::post('/productDetail', [ProductController::class, 'showProductDetail'])->name('showProductDetail');


// // お問い合わせフォーム画面
// Route::get('/contacts/contact', [ContactController::class, 'showContact'])->name('showContact');
// // Route::post('/contacts/contact', [ContactController::class, 'showContact'])->name('showContact');
// // Route::post('/users/userInfo', [Controller::class, 'register'])->name('register');
// // Route::get('/users/userInfo', [Controller::class, 'register'])->name('register'); 

// // 確認画面
// Route::get('/contacts/confirm', [ContactController::class, 'showConfirm'])->name('showConfirm');
// Route::post('/contacts/confirm', [ContactController::class, 'showConfirm'])->name('showConfirm');

// // 登録完了画面
// Route::get('/contacts/complete', [ContactController::class, 'showComplete'])->name('showComplete');
// Route::post('/contacts/complete', [ContactController::class, 'showComplete'])->name('showComplete');

// // ユーザー情報編集
// Route::get('/contacts/update_contact/{id}', [ContactController::class, 'showUpdate'])->name('showUpdate');
// Route::post('/contacts/update_contact/{id}', [ContactController::class, 'showUpdate'])->name('showUpdate');

// // 編集確認画面
// Route::post('/contacts/update/{id}', [ContactController::class, 'showUpdateConfirm'])->name('showUpdateConfirm');

// // 編集処理
// Route::post('/contacts/contact2/{id}', [ContactController::class, 'register'])->name('register');

// // // 編集完了画面
// // Route::get('/contacts/update_complete/{id}', [ContactController::class, 'showUpdateComplete'])->name('showUpdateComplete');


// // ユーザー情報削除
// Route::post('/contacts/contact/{id}', [ContactController::class, 'softDelete'])->name('softDelete');

