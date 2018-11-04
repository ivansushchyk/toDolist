@extends('main')


@section('content')

  <h1> Edit : {!! $task->name !!}  </h1>
   <div>
       {!! Form::model($task,['method' => 'patch', 'action' => ['TaskController@update', $task->id]])!!}
       {!! Form::label('name', 'Name:') !!}
       {!! Form::text('name') !!}
   </div>

   <div>
       {!! Form::label('body', 'Body:') !!}
       {!! Form::textarea('body') !!}
   </div>

   <div>
       {!! Form::Submit('Update task')!!}

   </div>


   {!! Form::close() !!}
  <td><a href="/tasks/{{ $task->id }}" class="button"> Go back </a></td>

   @if ($errors->any())

       @foreach($errors->all() as $error)
           <ul>
               <li> {{ $error }} </li>
           </ul>
       @endforeach
   @endif
@stop