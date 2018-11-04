@extends('layouts/app')


@section('content')

  <h1> Edit : {!! $task->name !!}  </h1>

       {!! Form::model($task,['method' => 'patch', 'action' => ['TaskController@update', $task->id]])!!}
       {!! Form::label('name', 'Name:') !!}
       {!! Form::text('name') !!}


   <div>
       {!! Form::label('body', 'Body:') !!}
       {!! Form::textarea('body') !!}
   </div>

       {!! Form::Submit('Update task')!!}




   {!! Form::close() !!}


   @if ($errors->any())

       @foreach($errors->all() as $error)
           <ul>
               <li> {{ $error }} </li>
           </ul>
       @endforeach
   @endif
@stop