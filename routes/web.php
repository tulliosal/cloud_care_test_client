<?php

use App\Http\Controllers\BeerController;
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
    return view('auth.login');
});

//Route::get('/beers', function () {
//
//    $response = Http::post('http://localhost:8000/api/login', ['email' => 'user@test.com', 'password' => '123456']);
//
//    $headers = [
//        'Accept' => 'application/json',
//        'Authorization' => 'Bearer '.$response->json()['data']['token'],
//    ];
//
//    $response = Http::withHeaders($headers)->get('http://localhost:8000/api/products');
//
//    return view('beers', ['beers' => "<pre>".print_r($response->json(), true)."<pre>"]);
//
//})->middleware(['auth', 'verified'])->name('beers');

Route::get('/beers', [BeerController::class, 'show'])->middleware(['auth', 'verified'])->name('beers');

require __DIR__.'/auth.php';

