@extends('main')


@section('content')
    <h1>
        Tasks :{{ $task->name }}
    </h1>

   <hr>
    <h3>
    {{ $task->body }}
    </h3>

    <td><a href="/tasks/{{ $task->id }}/edit" class="button"> Edit task </a></td>
{!! Form::open(['method' => 'DELETE', 'action' => ['TaskController@destroy', $task->id]])!!}
<input type="submit" value="Delete" class="button">
{!! Form::close() !!}

@if ($task->active == 0)
    {!! Form::open(['method' => 'POST', 'url' => 'tasks/unarchive'])!!}
    <td><input type="submit" value="Mark active" class="button"></td>
    {!! Form::hidden('id',$task->id) !!}
    {!! Form::close() !!}
@else

    {!! Form::open(['method' => 'POST', 'url' => 'tasks/archive'])!!}
    <td><input type="submit" value="Mark inactive" class="button"></td>
    {!! Form::hidden('id',$task->id) !!}
    {!! Form::close() !!}
@endif

@stop
