@extends('/layouts/app')


@section('content')
    <h1>
        Active tasks
    </h1>
    <div class="active">
        <hr>

        @foreach($activeTask as $task)
            <h4> {{ $task->name }}  </h4>

            {!! Form::open(['method' => 'GET', 'action' => ['TaskController@show',$task->id]])!!}
            <input type="submit" value="Show task" class="button">
            {!! Form::close() !!}

            {!! Form::open(['method' => 'POST', 'action' => ['TaskController@archive',$task->id]])!!}
            <input type="submit" value="Mark inactive" class="button">
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'action' => ['TaskController@destroy', $task->id]])!!}
            <input type="submit" value="Delete" class="button">
            {!! Form::close() !!}
            <hr>

        @endforeach
    </div>

    <h1>
        Inactive tasks
    </h1>
    <hr>

    @foreach($inactiveTask as $task)
        <h4> {{ $task->name }}  </h4>
        {!! Form::open(['method' => 'GET', 'action' => ['TaskController@show',$task->id]])!!}
        <input type="submit" value="Show task" class="button">
        {!! Form::close() !!}


        {!! Form::open(['method' => 'POST', 'action' => ['TaskController@unarchive',$task->id]])!!}
        <input type="submit" value="Mark active" class="button">
        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'action' => ['TaskController@destroy', $task->id]])!!}
        <input type="submit" value="Delete" class="button">
        {!! Form::close() !!}

    @endforeach

@stop





