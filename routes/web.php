<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.users.base');
});

Route::get('/dashboard', function () {
    return view('layouts.admin.base');
});

Route::middleware('auth')->group(function () {
    Route::group(
        [
            'middleware'    => ['role:admin'],
            'prefix'        => 'admin'
        ],
        function () {
            
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
