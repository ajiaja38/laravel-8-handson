<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('task/create', [TaskController::class, 'create']);
Route::post('task', [TaskController::class, 'store']);
Route::get('tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('task/{id}', [TaskController::class, 'show']);
Route::patch('task/{id}', [TaskController::class, 'update']);
Route::delete('task/{id}', [TaskController::class, 'delete']);

Route::get('all-req', function() {
    return ddd(request()->all());
});
Route::get('welcome', [HomeController::class, 'index']);
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