<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SpiceController;
use App\Http\Controllers\FavoriteController;

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
Route::get('/userComplete', [UserController::class, 'showUserComplete'])->name('showUserComplete');

// トップ画面
Route::post('/topPage', [TopController::class, 'showTopPage'])->name('showTopPage');
Route::get('/topPage', [TopController::class, 'showTopPage'])->middleware('auth');


// // ログイン画面
// Route::get('/', [TopController::class, 'showLogin'])->name('showLogin');
// Route::post('/', [TopController::class, 'register'])->name('register');

// ログイン処理
Route::post('/login', [TopController::class, 'login'])->name('login');
Route::get('/login', [TopController::class, 'login'])->name('login');

// ログアウト処理
Route::post('/logout', [TopController::class, 'logout'])->name('logout');

// スパイス一覧画面
Route::get('/spice', [SpiceController::class, 'showSpice'])->name('showSpice');
Route::post('/spice', [SpiceController::class, 'showSpice'])->name('showSpice');

// スパイス詳細画面
Route::get('/spiceDetail/{id}', [SpiceController::class, 'showSpiceDetail'])->name('showSpiceDetail');


// 店舗一覧画面
Route::get('/store', [StoreController::class, 'showStore'])->name('showStore');

// 店舗詳細画面
Route::get('/storeDetail/{id}', [StoreController::class, 'showStoreDetail'])->name('showStoreDetail');

// 新規店舗登録画面
Route::get('/storeRegister', [StoreController::class, 'showStoreRegister'])->name('showStoreRegister');

// 写真アップロード
Route::resource('upload',StoreController::class);

// 新規店舗登録内容確認画面
Route::post('/storeConfirm', [StoreController::class, 'showStoreConfirm'])->name('showStoreConfirm');

// 新規店舗登録完了画面
Route::post('/storeComplete', [StoreController::class, 'showStoreComplete'])->name('showStoreComplete');

// // 店舗情報変更
// Route::get('/storeUpdate/{id}', [StoreController::class, 'showUserUpdate'])->name('showUserUpdate');

// // 変更情報確認画面
// Route::post('/storeUpdateConfirm/{id}', [StoreController::class, 'showUserUpdateConfirm'])->name('showUserUpdateConfirm');

// // 変更処理
// Route::post('/storeUpdateComplete/{id}', [StoreController::class, 'showUserUpdateComplete'])->name('showUserUpdateComplete');


// 店舗Menu登録画面
Route::get('/dishRegister', [DishController::class, 'showDishRegister'])->name('showDishRegister');

// 店舗Menu登録内容確認画面
Route::post('/dishConfirm', [DishController::class, 'showDishConfirm'])->name('showDishConfirm');

// 店舗Menu登録完了画面
Route::post('/dishComplete', [DishController::class, 'showDishComplete'])->name('showDishComplete');


// 商品一覧画面
Route::get('/product', [ProductController::class, 'showProduct'])->name('showProduct');
Route::post('/product', [ProductController::class, 'showProduct'])->name('showProduct');

// 商品詳細画面
Route::get('/productDetail/{id}', [ProductController::class, 'showProductDetail'])->name('showProductDetail');


// ユーザー情報変更
Route::get('/userUpdate/{id}', [UserController::class, 'showUserUpdate'])->name('showUserUpdate');

// 変更情報確認画面
Route::post('/userUpdateConfirm/{id}', [UserController::class, 'showUserUpdateConfirm'])->name('showUserUpdateConfirm');

// 変更処理
Route::post('/userUpdateComplete/{id}', [UserController::class, 'showUserUpdateComplete'])->name('showUserUpdateComplete');

// ユーザー管理画面
Route::get('/userIndex', [UserController::class, 'showUserIndex'])->name('showUserIndex');


// ユーザー情報削除
Route::post('/delete/{id}', [UserController::class, 'softDelete'])->name('softDelete');

// // お気に入り登録
// Route::get('/store/like/{id}', [StoreController::class, 'toggleFavorite'])->name('toggleFavorite');

// // お気に入り解除
// Route::get('/store/unlike/{id}', [StoreController::class, 'toggleUnFavorite'])->name('toggleUnFavorite');
// お気に入り登録・解除のルーティング
Route::get('/store/toggle-favorite/{id}', [StoreController::class, 'toggleFavorite'])->name('store.toggleFavorite');

// お気に入り画面
Route::get('/favorite/{id}', [FavoriteController::class, 'showFavorite'])->name('showFavorite');



