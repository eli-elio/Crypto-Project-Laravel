<?php

use App\Models\CryptoAsset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\CryptoAssetController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/calculator', function() {
    return file_get_contents(public_path().'/calculator.blade.html');
})->middleware(['auth'])->name('calculator');

Route::get('/crypto-news', [\App\Http\Controllers\CryptoNewsArticleController::class, 'index'])->middleware(['auth'])->name('crypto-news');

Route::get('/my-wallet', [\App\Http\Controllers\WalletsController::class, 'create'])->middleware(['auth'])->name('my-wallet.create');
Route::post('/wallet', [\App\Http\Controllers\WalletsController::class, 'store'])->middleware(['auth'])->name('my-wallet.store');

Route::get('/buy-form', [\App\Http\Controllers\BuyCryptoController::class, 'create'])->middleware(['auth'])->name('buy.create');
//Route::post('/form', [\App\Http\Controllers\BuyCryptoController::class, 'store'])->middleware(['auth'])->name('buy.store');
Route::get('/buy-crypto', [\App\Http\Controllers\BuyCryptoController::class, 'open'])->middleware(['auth'])->name('buy.crypto');
Route::post('/my-crypto-update', [\App\Http\Controllers\BuyCryptoController::class, 'update'])->middleware(['auth'])->name('my.crypto.update');

Route::get('/my-crypto', [\App\Http\Controllers\MyCryptocurrenciesController::class, 'show'])->middleware(['auth'])->name('my-crypto');
Route::post('/crypto', [\App\Http\Controllers\MyCryptocurrenciesController::class, 'store'])->middleware(['auth'])->name('crypto');
Route::get('/crypto-sell', [\App\Http\Controllers\MyCryptocurrenciesController::class, 'sell'])->middleware(['auth'])->name('crypto-sell');
Route::post('/sell', [\App\Http\Controllers\MyCryptocurrenciesController::class, 'confirm'])->middleware(['auth'])->name('sell');

require __DIR__.'/auth.php';
