<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $task = [
        "first" => "Task 1",
        "second" => "Task 2",
        "third" => "Task 3"
    ];

    public function index(Request $request): array
    {
        if (request()->search)
        {
            return $this->task[request()->search];
        }

        return $this->task;
    }

    public function store(Request $request): array
    {
        $this->task[$request()->label] = $request()->task;
        return $this->task;
    }

    public function show($param)
    {
        return $this->task[$param];
    }

    public function update(Request $request, $param): array
    {
        $this->task[$param] = $request()->task;
        return $this->task;
    }

    public function delete($param): array
    {
        unset($this->task[$param]);
        return $this->task;
    }
}
