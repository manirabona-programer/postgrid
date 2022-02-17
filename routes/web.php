<?php

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

Route::get("/murugo-login", '\App\Http\Controllers\MurugoLoginController@redirectToMurugo')->name('murugo.login');
Route::get("/murugo-callback", '\App\Http\Controllers\MurugoLoginController@murugoCallback')->name('murugo.Callback');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
