@extends('app')
@section('content')
<div class="mb-3">
    @if(isset($stories->response('meta')->orders->current->story_number) && $stories->response('meta')->orders->current->story_number =='asc')
        <span class="badge badge-ligth">از اولین روایت</span> |
    @else
        <a href="{{route('home', ['order' => 'story_number', 'sort' => 'asc'])}}" class="badge badge-secondary">از اولین روایت</a> |
    @endif

    @if(isset($stories->response('meta')->orders->current->story_number) && $stories->response('meta')->orders->current->story_number =='desc')
        <span class="badge badge-ligth">از آخرین روایت</span> |
    @else
        <a href="{{route('home', ['order' => 'story_number', 'sort' => 'desc'])}}" class="badge badge-secondary">از آخرین روایت</a> |
    @endif

    @if(isset($stories->response('meta')->orders->current->id) && $stories->response('meta')->orders->current->id =='asc')
        <span class="badge badge-ligth">از جدیدترین روایت</span> |
    @else
    <a href="{{route('home', ['order' => 'id', 'sort' => 'asc'])}}" class="badge badge-secondary">از جدیدترین روایت</a> |‌
    @endif

    @if(isset($stories->response('meta')->orders->current->id) && $stories->response('meta')->orders->current->id =='desc')
        <span class="badge badge-ligth">از قدیمی‌ترین روایت</span>
    @else
    <a href="{{route('home', ['order' => 'id', 'sort' => 'desc'])}}" class="badge badge-secondary">از قدیمی‌ترین روایت</a>
    @endif
</div>

    @foreach ($stories as $story)
        <article class="post">
            <h2 class="post-title">
                <a href="{{route('stories.show', $story->id)}}"><sup>{{$story->story_number}}</sup> {{$story->title}}</a>
            </h2>
            <div class="post-content">
                <p>
                    {!!str_replace('<br />', "</p>\n<p>", nl2br($story->content))!!}
                </p>
                <blockquote>
                <p>{{$story->summary}}</p>
                </blockquote>
            </div>
        </article>
    @endforeach
    <div class="text-secondary d-flex justify-content-center">{{$stories->render()}}</div>

@endsection
