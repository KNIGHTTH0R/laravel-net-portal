@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Articles <a href="articles/create" class="pull-right">Create Article</a></div>

                <div class="panel-body">
                    @foreach ($articles as $article)
                    <h3><a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a></h3>
                    @if (count($article->tags))
                    <ul class="inline-list" style="padding-left: 0px;">
                    @foreach ($article->tags as $tag)
                        <li class="badge">{{ $tag->name }}</li>
                    @endforeach
                    </ul>
                    @endif
                    <p>{!! nl2br(e(str_limit($article->body, 300, '...'))) !!}</p>
                    <a href="{{ action('ArticlesController@show', [$article->id]) }}" class="btn btn-primary">Read More...</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
