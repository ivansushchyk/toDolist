@extends('layouts/app')


@section('content')

    <h1>
       {{ $task->name }}
    </h1>

   <hr>

    <h3>
    {{ $task->body }}
    </h3>
    <div class="container3">
        <form method="get" class="inline-form" action="/tasks/{{$task->id}}/edit">
            <input type="submit" class="btn btn-primary btn-sm" value="Edit" >
        </form>

        <form class="inline-form" method="post" action="tasks/{{$task->id}}">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
            <input type="submit" class="btn btn-primary btn-sm" value="Delete">
        </form>

    @if ($task->active == 0)
            <form class="inline-form" method="post" action="/tasks/unarchive/{{ $task->id }}">
                @csrf
                <input type="submit" class="btn btn-primary btn-sm" value="Mark active">
            </form>
@else

            <form class="inline-form" method="post" action="/tasks/archive/{{ $task->id }}">
                @csrf
                <input type="submit" class="btn btn-primary btn-sm" value="Mark inactive">
            </form>
@endif
    </div>
@stop
