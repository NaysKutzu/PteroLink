<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;

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
    return view('app');
});

Route::get('/test', function () {
    return view('test');
});

Route::middleware(['throttle:authentication'])->group(function () {
    Route::post('/login', [Auth\AuthController::class, 'login']);
});


Route::get('/{any}', function () {
    return view('app');
});
