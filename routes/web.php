<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config; 
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

use App\Models\Settings;
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
    $sslEnabled = Request::secure(); // Check if SSL is enabled for the current request
    return response()->json([
        'PteroLink' => Config::get('app.version'),
        'SSL' => $sslEnabled,
    ], Response::HTTP_OK, [], JSON_PRETTY_PRINT); // JSON_PRETTY_PRINT will format the JSON response in a human-readable way
});


require __DIR__.'/auth.php';
