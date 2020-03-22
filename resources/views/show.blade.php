@extends('app')
@section('content')
    <article class="post">
        <h2 class="post-title">
            <a href="{{route('stories.showTitle', ['story' => $story->id, 'title' => snake_url($story->title)])}}"><sup>{{$story->story_number}}</sup> {{$story->title}}</a>
        </h2>
        <div class="post-content">
            <p>
                {{$story->content}}
            </p>
        </div>
    </article>
@endsection
