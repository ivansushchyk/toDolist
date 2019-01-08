@extends('/layouts/app')
@section('content')
    <div class="container">
        <h1>
            Active tasks
        </h1>
    @if (count($activeTasks))
         <table class="table">
             <thead>
             <tr>
                 <th scope="col">Task</th>
                 <th scope="col">Actions</th>
             </tr>
             </thead>
             <tbody>
             @foreach($activeTasks as $task)
                 <tr>
                     <th scope="row">{{ $task->name }}</th>
                     <td>
                         <a href="tasks/{{ $task->id }}" class="btn btn-primary btn-sm">Show</a>
                         <form class="inline-form" method="post" action="tasks/archive/{{ $task->id }}">
                             @csrf
                             <input type="submit" class="btn btn-primary btn-sm" value="Mark inactive">
                         </form>
                         <form class="inline-form" method="post" action="tasks/{{$task->id}}">
                             <input type="hidden" name="_method" value="DELETE">
                             @csrf
                             <input type="submit" class="btn btn-primary btn-sm" value="Delete">
                         </form>
                     </td>
                 </tr>
             @endforeach
             </tbody>
         </table>
     </div>
 @endif


 @stop





