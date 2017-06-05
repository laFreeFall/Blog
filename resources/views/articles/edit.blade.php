@extends('layouts.app')

@section('content')
    <h1>Editing the article</h1>
    <hr>
    <div class="article">
        <h3 class="text-center">{{ $article->title }}</h3>

        {{--<div class="article_body">{{ $article->body }}</div>--}}
    </div>

    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
    @include('articles._form', ['SubmitButtonText' =>'Save changes'])
    {!! Form::close() !!}

    @include('errors.list')

    <hr>
    <a href="{{ action('ArticlesController@index') }}">Return to the list of the articles</a>
@stop