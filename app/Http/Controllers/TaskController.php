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
            $tasks = Task::where('task', 'like', '%' . request()->search . '%')
                ->orderBy('updated_at', 'desc')
                ->paginate(5);;

            return view('task.index', compact('tasks'));
        }

        $tasks = Task::orderBy('updated_at', 'desc')->paginate(5);
        return view('task.index', [
            'data' => $tasks
        ]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request): string
    {
        $validateData = $request->validate([
            'user' => 'required|string|max:255',
            'task' => 'required|string|min:3|max:255'
        ]);

        Task::create($validateData);

        return redirect()->route('tasks');
    }

    public function show($param)
    {
        return response()->json([
            "message" => "success get task",
            "data" => Task::find($param)
        ]);
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $param)
    {
        $tableTask = DB::table('task');

        $tableTask->where('id', $param)->update([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return redirect()->route('tasks');
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
