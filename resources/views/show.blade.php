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
    <a href="/tasks/{{ $task->id }}/remark" class="button"> Check active </a>
@else
    <a href="/tasks/{{ $task->id }}/mark" class="button"> Add to archive </a>
@endif

@stop
