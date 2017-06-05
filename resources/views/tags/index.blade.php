@extends('layouts.app')

@section('content')
    <h1 class="text-center">List of the tags</h1>

    @if(count($tags))
        @foreach($tags as $tag)
                <a href="{{ action('TagsController@show', [$tag->name]) }}" class="btn btn-default">{{ $tag->name }} ({{ count($tag->articles) }})</a>
        @endforeach
    @else
        <h3>There are no available tags at the moment );</h3>
    @endif
@stop