@extends('layouts.app')

@section('content')
    <h1 class="text-center">{{ $article->title }}</h1>
    <hr>
    <div class="article">
        <div class="article_body">{{ $article->body }}</div>
        <br>
        @unless($article->tags->isEmpty())
            <h4 class="inline">Tags: </h4>
                @foreach($article->tags as $tag)
                    <a href="{{ action('TagsController@show', [$tag->name]) }}" class="btn btn-default">{{ $tag->name }}</a>
            @endforeach
        @endunless
        <br><br>
        <h5 class="inline">Author: </h5><a href="{{ action('UsersController@index', [$article->user->name]) }}">{{$article->user->name}}</a>

    </div>
    <hr>
    <a href="{{ action('ArticlesController@edit', $article->id) }}" class="btn btn-info">Edit the article</a>
    <div class="align-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['articles.destroy', $article->id]
        ]) !!}
        {!! Form::submit('Delete this article', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <hr>
    {!! Form::open(['url' => 'comments']) !!}
    @include('comments._form')
    {!! Form::close() !!}
    @include('errors.list')
    <hr>
    <a href="{{ action('ArticlesController@index') }}">Return to the list of the articles</a>
@stop