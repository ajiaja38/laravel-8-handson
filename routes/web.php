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

$task = [
    "first" => "Task 1",
    "second" => "Task 2",
    "third" => "Task 3"
];

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

Route::get('tasks', function() use($task) {
    if (request()->search) {
        return $task[request()->search];
    }

    return $task;
});

Route::get('task/{name}', function($param) use($task) {
    return response()->json([
        "task" => $task[$param]
    ]); 
});

Route::post('/task', function() use($task) {
    $task[request()->label] = request()->task;
    
    return $task;
});