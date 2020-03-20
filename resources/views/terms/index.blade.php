@section('sub-title')
ویژه‌نامه {{__($term->title)}}
@endsection
@section('content')
<div class="mb-5">
    <a href="{{route('termPost.index', ['term' => $term->title])}}" class="badge align-middle badge-secondary">{{__($term->title)}}</a>
    @foreach ($terms as $item)
    <a href="{{route('termPost.subIndex', ['term' => $term->title, 'subTerm' => $item->id])}}" class="badge align-middle badge-secondary">{{$item->title}}</a>
    @endforeach
</div>
    @foreach ($posts as $post)
        <article class="post">
            <h2 class="post-title">
                <a href="{{route('termPost.show', ['term' => $post->primary_term->title, 'post' => $post->id])}}">{{$post->title}}</a>
            </h2>
            <div class="post-content">
                <p>
                    @markdown($post->content)
                </p>
            </div>
        </article>
    @endforeach
@endsection
@include('app')
