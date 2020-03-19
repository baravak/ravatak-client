@extends('app')
@section('content')
    <article class="post">
        <h2 class="post-title">
            <a href="{{route('stories.show', $story->id)}}"><sup>{{$story->story_number}}</sup> {{$story->title}}</a>
        </h2>
        <div class="post-content">
            <p>
                {{$story->content}}
            </p>
        </div>
    </article>
@endsection
