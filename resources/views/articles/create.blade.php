@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Write new Article</h1>
            <hr>
        </div>

        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(['url' => 'articles']) !!}
            @include('articles.form', ['submitButtonText' => 'Add article'])
            {!! Form::close() !!}

            @include('errors.list')

        </div>
    </div>
</div>

@endsection
