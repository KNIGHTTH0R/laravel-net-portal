@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Create a new Task</h1>

            <hr />

            {!! Form::open(['url' => 'tasks']) !!}
            @include('tasks.form', ['buttonText' => 'Add task'])
            {!! Form::close() !!}

            @include('errors.list')

        </div>
    </div>
</div>

@endsection
