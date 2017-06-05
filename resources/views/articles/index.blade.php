@extends('layouts.app')

@section('content')
    <h1 class="text-center">
        @if(isset($tag))
            {{--Articles with tag <span class="btn btn-lg btn-default"><strong>{{ $tag->name }} </strong></span>--}}
            Articles with tag "<strong>{{ $tag->name }}</strong>"({{ count($articles) }})</span>
        @elseif(isset($user))
            <strong>{{ $user->name }}</strong>'s articles ({{ count($articles) }})</span>
        @else
            List of the articles
        @endif
    </h1>
    <a href="{{ action('ArticlesController@create') }}" class="align-right">Create a new article</a>

    <hr>
    @if(count($articles))
        @foreach($articles as $article)
            <div class="article">
                <h3 class="text-center"><a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a></h3>

                <div class="article_body">{{ $article->body }}</div>

                @unless($article->tags->isEmpty())
                    <h4 class="inline">Tags: </h4>
                    @foreach($article->tags as $tag)
                        <a href="{{ action('TagsController@show', [$tag->name]) }}" class="btn btn-default">{{ $tag->name }}</a>
                    @endforeach
                @endunless
                <br>
                @if(isset($user))
                    <h5 class="inline">Author: </h5><a href="{{ action('UsersController@index', [$user->name]) }}">{{$user->name}}</a>
                @else
                    <h5 class="inline">Author: </h5><a href="{{ action('UsersController@index', [$article->user->name]) }}">{{$article->user->name}}</a>
                @endif
            </div>
            <hr>
        @endforeach
    @else
        <h3>There are no available articles at the moment );</h3>
    @endif
@stop