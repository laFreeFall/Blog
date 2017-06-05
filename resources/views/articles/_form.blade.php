<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
{{--    {!! Form::select('tag_list[]', $tags, $article->tags->lists('id')->toArray(), ['class' => 'form-control', 'multiple']) !!}--}}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list','class' => 'form-control', 'multiple']) !!}
</div>
{{--<ul>--}}
    {{--@foreach ($tags as $tagId => $tagValue)--}}
        {{--<li>{{ $tagId }}: {{ $tagValue }}</li>--}}
    {{--@endforeach--}}
{{--</ul>--}}
{{--{{ dd($article->tags->lists('id')->toArray()) }}--}}

<div class="form-group">
    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag'
//            tags: true,
//            ajax: {
//                dataType: 'json',
//                url: 'tags.json',
//                processResults: function(data) {
//                    return { results: data }
//                }
//            }
        });
    </script>
@stop