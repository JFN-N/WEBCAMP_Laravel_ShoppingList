<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ShoppingListController;

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

Route::get('/', [AuthController::class, 'index']);

Route::get('/user/register', [UserController::class, 'index']);
/*

// 会員登録
Route::prefix('/user')->group(function () {
    Route::get('/register', [UserController::class, 'index'])->name('front.user.register');
    Route::post('/register', [UserController::class, 'register'])->name('front.user.register.post');
});

*/

Route::get('/shopping_list/list', [ShoppingListController::class, 'list']);

/*

Route::get('/', function () {
    return view('welcome');
});

*/
// 購入済み「買うもの」一覧
    Route::get('/completed_shopping_list/list', [CompletedShoppingListController::class, 'index']);
    // ログアウト
    Route::get('/logout', [AuthController::class, 'logout']);

