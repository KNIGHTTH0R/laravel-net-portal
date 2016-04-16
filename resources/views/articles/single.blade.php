@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>{{ $article->title }}</h1>
            @if (count($article->tags))
            <ul class="inline-list" style="padding-left: 0px;">
            @foreach ($article->tags as $tag)
                <li class="badge">{{ $tag->name }}</li>
            @endforeach
            </ul>
            @endif
            <p>{!! nl2br(e($article->body)) !!}</p>
        </div>

        @if ($article->user_id == Auth::id())
        <div class="col-md-10 col-md-offset-1" style="padding-bottom:20px;">
            {!! Form::open(['url' => 'articles/'.$article->id, 'method' => 'delete']) !!}
            <a href="{{ URL::current(), $article->id }}/edit" class="btn btn-warning pull-left">Edit</a>
            {!! Form::submit('Delete', ['class' => 'btn btn-danger pull-right']) !!}
            {!! Form::close() !!}
        </div>
        @endif
    </div>
</div>

@endsection
