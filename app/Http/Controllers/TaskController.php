<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index()
    {
        $activeTasks = Task::where('active', 1)->where('user_id', Auth::id())->get();
        return view('tasks/index')->with('activeTasks', $activeTasks);
    }


    public function showInactive() {
        $inactiveTasks = Task::where('active', 0)->where('user_id', Auth::id())->get();
        return view('tasks/inactiveTasks')->with('inactiveTasks',$inactiveTasks);
    }
    public function show($id)
    {
        $task = Task::find($id);
        if (($task['user_id'] == Auth::id())) {
            return view('tasks/show', compact('task'));
        } else {
            abort(403);
        }

    }

    public function store(CreateTaskRequest $request)
    {
        $newTask = $request->all();
        $newTask['user_id'] = Auth::id();
        Task::create($newTask);
        return redirect('tasks');
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function edit($id)
    {
        $task = Task::findorFail($id);
        if ($task['user_id'] == Auth::id()) {
            return view('tasks/edit', compact('task'));
        } else {

            abort(403);
        }
    }

    public function update($id, CreateTaskRequest $request)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return view('tasks/show', compact('task'));
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('tasks');
    }

    public function archive($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['active' => 0]);
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function unarchive($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['active' => 1]);
        return redirect($_SERVER['HTTP_REFERER']);

    }
}
