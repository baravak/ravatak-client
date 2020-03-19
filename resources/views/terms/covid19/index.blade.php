@section('sub-title')
ویژه‌نامه ویروس کرونا (COVID-19)
@endsection
@section('content')
    @foreach ($posts as $post)
        <article class="post">
            <h2 class="post-title">
                <a href="{{route('termPost.show', ['term' => $post->primary_term->title, 'post' => $post->id])}}">{{$post->title}}</a>
            </h2>
            <div class="post-content">
                <p>
                    {{$post->content}}
                </p>
            </div>
        </article>
    @endforeach
@endsection
@include('app')
