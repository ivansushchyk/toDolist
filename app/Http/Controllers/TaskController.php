<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Task;
use Request;


class TaskController extends Controller
{
    public function index(){
        $tasks = Task::where('active', 1)->get();
        return view('tasks',compact('tasks'));
    }

    public function show($id) {
        $task = Task::find($id);
        if ($task) {
        return view('show',compact('task'));
        }
        else {
            abort(404);
        }
    }
    public function store(CreateTaskRequest $request)
    {
        $newPost = Request::all();
        Task::create($newPost);
        return redirect('tasks');
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id){
        $task = Task::findOrFail($id);
        return view('edit',compact('task'));
    }
    public function update($id,CreateTaskRequest $request) {
        $task = Task::findOrFail($id);
        $task->update(Request::all());
        return redirect('tasks');
    }
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('tasks');
    }

    public function mark($id)
    {
        $task = Task::findOrFail($id);
        $task['active'] = 0;
        $task->save();
        return redirect('tasks');

        /// Може тут краще зробити одну функцію switch status?? //
    }
    public function remark($id) {
        $task = Task::findOrFail($id);
        $task['active'] = 1;
        $task->save();
        return redirect('/tasks/archive');

    }

    public function archive() {
        $tasks = Task::where('active', 0)->get();
        return view('archive',compact('tasks'));
    }
}
