@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Edit: {!! $article->title !!}</h1>

            <hr />
        </div>

        <div class="col-md-10 col-md-offset-1">
            {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
            @include('articles.form', ['submitButtonText' => 'Edit article'])
            {!! Form::close() !!}

            @include('errors.list')

        </div>
    </div>
</div>

@endsection
