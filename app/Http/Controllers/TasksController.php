<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;

class TasksController extends Controller
{
    public function index(): View
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store()
    {
        $this->validate(\request(), [
            'title'=> 'required|min:5',
            'body'=> 'required'
        ]);
        Task::create(\request()->all());
        return redirect('/tasks');
    }
}
