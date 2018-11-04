@extends('layouts/app')



@section('content')

    {!! Form::open(['url' => 'tasks']) !!}
    <div>
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name') !!}
    </div>

    <div>
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body') !!}
    </div>

    <div>
        {!! Form::Submit('Add task')!!}

    </div>


    {!! Form::close() !!}

    @if ($errors->any())

        @foreach($errors->all() as $error)
            <ul>
                <li> {{ $error }} </li>
            </ul>
        @endforeach
    @endif
@stop