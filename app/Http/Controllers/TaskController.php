<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // $tasks = Task::paginate(10);
        // $tasks = Task::all();
        // return view("tasks.index", compact("tasks"));
        $query = Task::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('content', 'LIKE', "%$search%");
        }

        $tasks = $query->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create() 
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return redirect()->route('tasks.index')->with('message','Create task successfully');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('message','Update task successfully');
    }
}
