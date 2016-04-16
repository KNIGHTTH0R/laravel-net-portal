@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Task: {{ $task->title }} <span class="pull-right">
                        @if ( $task->completed)
                        Completed: {{ $task->updated_at }}</span>
                        @endif
                    </h3>
                </div>
                <div class="panel-body">
                    <p>{!! nl2br(e($task->description)) !!}</p>
                </div>
            </div>
            @if ( ! $task->completed)
            @if ($task->user_id == Auth::id())
            {!! Form::submit('Delete', ['class' => 'btn btn-danger pull-right']) !!}
            @endif
            {!! Form::model($task, ['method' => 'PATCH', 'action' => ['TasksController@update', $task->id]]) !!}
            {!! Form::submit('Mark as Done', ['class' => 'btn btn-success pull-left']) !!}
            @endif
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection




