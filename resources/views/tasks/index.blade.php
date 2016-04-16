@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    To-Do Tasks: {{ $tasksCount }}
                    <a href="tasks/create" class="pull-right">Create Task</a>
                </div>
                <div class="panel-body">
                    @foreach ($tasks as $task)
                    <div class="panel">
                        <h3><a href="{{ action('TasksController@show', [$task->id]) }}">{{ $task->title }}</a></h3>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Completed Tasks: {{ $completedCount }}
                </div>
                <div class="panel-body">
                    @foreach ($completedTasks as $completedTask)
                    <div class="panel">
                        <h3><a href="{{ action('TasksController@show', [$completedTask->id]) }}">{{ $completedTask->title }}</a></h3>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
