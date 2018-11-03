@extends('main')


@section('content')
    <h1>
        Active tasks
    </h1>
    <hr>
    <table>
        @foreach($tasks as $task)
            <th><h3> {{ $task->name }}  </h3></th>
            <td><a href="/tasks/{{ $task->id }}" class="button"> Show task </a></td>
            <td><a href="/tasks/{{ $task->id }}/mark" class="button"> Check notactive </a></td>
            {!! Form::open(['method' => 'DELETE', 'action' => ['TaskController@destroy', $task->id]])!!}
            <td><input type="submit" value="Delete" class="button"></td>
            {!! Form::close() !!}
            <tr>

        @endforeach
    </table>
@stop





