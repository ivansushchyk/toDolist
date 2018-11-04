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
        $activeTask = Task::where('active', 1)->where('user_id',Auth::id())->get();
        $inactiveTask = Task::where('active', 0)->where('user_id',Auth::id())->get();
        return view('tasks/index')->with('activeTask', $activeTask)->with('inactiveTask', $inactiveTask);
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
        $newPost = $request->all();
        $newPost['user_id'] = Auth::id();
        Task::create($newPost);
        return redirect('tasks');
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function edit($id)
    {
        $task = Task::findorFail($id);
        if($task['user_id'] == Auth::id()){
            return view('tasks/edit', compact('task'));
        }
    else {

        abort(403);
    }
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

    public function archive($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['active' => 0]);
        return redirect('tasks');
    }

    public function unarchive($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['active' => 1]);
        return redirect('tasks');

    }
}
