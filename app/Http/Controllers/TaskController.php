<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index()
    {
        $activeTask = Task::where('active', 1)->get();
        $inactiveTask = Task::where('active', 0)->get();
        return view('tasks/index')->with('activeTask', $activeTask)->with('inactiveTask', $inactiveTask);
    }

    public function show($id)
    {
        $task = Task::find($id);
        if ($task) {
            return view('tasks/show', compact('task'));
        } else {
            abort(404);
        }
    }

    public function store(CreateTaskRequest $request)
    {
        $newPost = $request->all();
        Task::create($newPost);
        return redirect('tasks');
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks/edit', compact('task'));
    }

    public function update($id, CreateTaskRequest $request)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect('tasks');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('tasks');
    }

    public function archive(Request $request)
    {
        $task = Task::findOrFail($request->input('id'));
        $task->update(['active' => 0]);
        return redirect('tasks');
    }

    public function unarchive(Request $request)
    {
        $task = Task::findOrFail($request->input('id'));
        $task->update(['active' => 1]);
        return redirect('tasks');

    }
}
