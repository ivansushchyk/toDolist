@extends('main')


@section('content')
    <h1>
        Active tasks
    </h1>
    <hr>
    <table>
        @foreach($activeTask as $task)
            <th><h3> {{ $task->name }}  </h3></th>
            <td><a href="/tasks/{{ $task->id }}" class="button"> Show task </a></td>

            {!! Form::open(['method' => 'POST', 'url' => 'tasks/archive'])!!}
            <td><input type="submit" value="Mark inactive" class="button"></td>
            {!! Form::hidden('id',$task->id) !!}
            {!! Form::close() !!}
            {!! Form::open(['method' => 'DELETE', 'action' => ['TaskController@destroy', $task->id]])!!}
            <td><input type="submit" value="Delete" class="button"></td>
            {!! Form::close() !!}
            <tr>

        @endforeach
    </table>

    <h1>
        Inactive tasks
    </h1>
    <hr>
    <table>
        @foreach($inactiveTask as $task)
            <th><h3> {{ $task->name }}  </h3></th>
            <td><a href="/tasks/{{ $task->id }}" class="button"> Show task </a></td>
            {!! Form::open(['method' => 'POST', 'url' => 'tasks/unarchive'])!!}
            <td><input type="submit" value="Mark active" class="button"></td>
            {!! Form::hidden('id',$task->id) !!}
            {!! Form::close() !!}
            {!! Form::open(['method' => 'DELETE', 'action' => ['TaskController@destroy', $task->id]])!!}
            <td><input type="submit" value="Delete" class="button"></td>
            {!! Form::close() !!}
            <tr>

        @endforeach
    </table>

@stop





