@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Edit: {!! $task->title !!}</h1>

            <hr />
        </div>

        <div class="col-md-10 col-md-offset-1">
            {!! Form::model($task, ['method' => 'PATCH', 'action' => ['TasksController@update', $task->id]]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Task:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit Task', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}

            @include('errors.list')

        </div>
    </div>
</div>

@endsection
