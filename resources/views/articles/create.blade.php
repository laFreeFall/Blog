@extends('layouts.app')

@section('content')
    <h1 class="text-center">Creating a new article</h1>

    {!! Form::open(['url' => 'articles']) !!}
        @include('articles._form', ['SubmitButtonText' => 'Add the article'])
    {!! Form::close() !!}

    @include('errors.list')

    <a href="{{ action('ArticlesController@index') }}">Return to the list of the articles</a>
@stop