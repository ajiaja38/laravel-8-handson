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

Route::get('about', function() {
    return view('about');
});

Route::get('hello', function() {
    $dataArray = [
        "name" => "John Doe",
        "age" => 30
    ];
    
    return response()->json([
        "message" => "Hello World",
        "data" => $dataArray
    ]);
});

Route::get('debug', function() {
    $dataArray = [
        "name" => "John Doe",
    ];

    ddd($dataArray);
});