<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

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

Route::post('task', [TaskController::class, 'store']);
Route::get('tasks', [TaskController::class, 'index']);
Route::get('task/{param}', [TaskController::class, 'show']);
Route::patch('task/{param}', [TaskController::class, 'update']);
Route::delete('task/{param}', [TaskController::class, 'delete']);

Route::get('all-req', function() {
    return ddd(request()->all());
});