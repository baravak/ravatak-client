@extends('app')
@section('content')
@isset($special)
    <article class="post" style="border-right: 4px solid #d85999;padding-right: 10px;">
        <h2 class="post-title">
            <a style="color:#d85999" href="{{route('termPost.index', $special->primary_term->title)}}">{{__($special->title)}}</a>
        </h2>
        <div class="post-content">
            <p>
                @markdown($special->content)
            </p>
            <a href="{{route('termPost.index', $special->primary_term->title)}}"> برای ورود به {{$special->title}} کلیک کنید</a>
        </div>
    </article>
@endisset
<div class="mb-5">
    @if(isset($stories->response('meta')->orders->current->story_number) && $stories->response('meta')->orders->current->story_number =='asc')
        <span class="badge align-middle badge-ligth">از اولین روایت</span> |
    @else
        <a href="{{route('home', ['order' => 'story_number', 'sort' => 'asc'])}}" class="badge align-middle badge-secondary">از اولین روایت</a> |
    @endif

    @if(isset($stories->response('meta')->orders->current->story_number) && $stories->response('meta')->orders->current->story_number =='desc')
        <span class="badge align-middle badge-ligth">از آخرین روایت</span> |
    @else
        <a href="{{route('home', ['order' => 'story_number', 'sort' => 'desc'])}}" class="badge align-middle badge-secondary">از آخرین روایت</a> |
    @endif

    @if(isset($stories->response('meta')->orders->current->id) && $stories->response('meta')->orders->current->id =='asc')
        <span class="badge align-middle badge-ligth">از جدیدترین روایت</span> |
    @else
    <a href="{{route('home', ['order' => 'id', 'sort' => 'asc'])}}" class="badge align-middle badge-secondary">از جدیدترین روایت</a> |‌
    @endif

    @if(isset($stories->response('meta')->orders->current->id) && $stories->response('meta')->orders->current->id =='desc')
        <span class="badge align-middle badge-ligth">از قدیمی‌ترین روایت</span>
    @else
    <a href="{{route('home', ['order' => 'id', 'sort' => 'desc'])}}" class="badge align-middle badge-secondary">از قدیمی‌ترین روایت</a>
    @endif
</div>

    @foreach ($stories as $story)
        <article class="post">
            <h2 class="post-title">
                <a href="{{route('stories.showTitle', ['story' => $story->id, 'title' => snake_url($story->title)])}}"><sup>{{$story->story_number}}</sup> {{$story->title}}</a>
            </h2>
            <div class="post-content">
                <p>
                    @markdown($story->content)
                </p>
                <blockquote>
                    @markdown($story->summary)
                </blockquote>
            </div>
        </article>
    @endforeach
    <div class="text-secondary d-flex justify-content-center">{{$stories->render()}}</div>

@endsection
