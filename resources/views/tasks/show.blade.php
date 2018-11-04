@extends('layouts/app')


@section('content')
    <h1>
       {{ $task->name }}
    </h1>

   <hr>
    <h3>
    {{ $task->body }}
    </h3>
    {!! Form::open(['method' => 'GET', 'action' => ['TaskController@edit',$task->id]])!!}
    <input type="submit" value="Edit task" class="button">
    {!! Form::close() !!}

{!! Form::open(['method' => 'DELETE', 'action' => ['TaskController@destroy', $task->id]])!!}
<input type="submit" value="Delete" class="button">
{!! Form::close() !!}

    @if ($task->active == 0)
    {!! Form::open(['method' => 'POST', 'action' => ['TaskController@archive', $task->id]])!!}
    <input type="submit" value="Mark active" class="button">
    {!! Form::close() !!}
@else

    {!! Form::open(['method' => 'POST', 'action' => ['TaskController@unarchive', $task->id]])!!}
    <input type="submit" value="Mark inactive" class="button">
    {!! Form::close() !!}
@endif

@stop
