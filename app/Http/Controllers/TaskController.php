<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        if (request()->search)
        {
            $tasks = Task::where('task', 'like', '%' . request()->search . '%')->paginate(3);
            return view('task.index', compact('tasks'));
        }

        $tasks = Task::paginate(3);
        return view('task.index', [
            'data' => $tasks
        ]);
    }

    public function store(Request $request): string
    {
        Task::create([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return 'success insert task';
    }

    public function show($param)
    {
        return response()->json([
            "message" => "success get task",
            "data" => Task::find($param)
        ]);
    }

    public function update(Request $request, $param): array
    {
        $tableTask = DB::table('task');

        $tableTask->where('id', $param)->update([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return $tableTask->get()->toArray();
    }

    public function delete($param)
    {
        $task = Task::find($param);
        $task->delete();

        return response()->json([
            "message" => "success delete task",
            "data" => DB::select('SELECT * FROM task')
        ]);
    }
}
