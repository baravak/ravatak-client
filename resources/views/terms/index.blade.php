@section('sub-title')
ویژه‌نامه {{__($term->title)}}
@endsection
@section('content')
<div class="mb-5">
    <a href="{{route('termPost.index', ['term' => $term->title])}}" class="badge align-middle badge-secondary">{{__($term->title)}}</a>
    @foreach ($terms as $item)
    @if (request()->route()->parameter('subTerm') == $item->id)
    <span class="badge align-middle badge-ligth">{{$item->title}}</span>
    @else
    <a href="{{route('termPost.subIndex', ['term' => $term->title, 'subTerm' => $item->id])}}" class="badge align-middle badge-secondary">{{$item->title}}</a>
    @endif
    @endforeach
</div>
    @if (!$posts->count())
        @isset($subTerm)
            سرفصل <strong>{{$subTerm->title}}</strong> هنوز مطلب منتشرشده‌ای ندارد...!
        @else
            ویژه‌نامه <strong>{{__($term->title)}}</strong> هنوز مطلب منتشرشده‌ای ندارد...!
        @endisset
    @endif
    @foreach ($posts as $post)
        <article class="post">
            <h2 class="post-title">
                <a href="{{route('termPost.show', ['term' => $term->title, 'post' => $post->id, 'title' => snake_url($post->title)])}}">{{$post->title}}</a>
            </h2>
            <div class="post-content">
                <p>
                    @markdown($post->content)
                </p>
            </div>
        </article>
    @endforeach
    <div class="text-secondary d-flex justify-content-center">{{$posts->render()}}</div>
@endsection
@include('app')
