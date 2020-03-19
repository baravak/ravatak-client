@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Posts') }} <sup>({{$posts->total()}})</sup>
            @filterBadge($posts)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($posts,'id', '#')</th>
                            <th>@sortView($posts,'title')</th>
                            <th>
                                @sortView($posts,'status', __('Status'), '<i class="fas fa-user-shield"></i>')
                                @filterView($posts, 'status')
                            </th>
                            <th>@sortView($posts,'primaryTerm', __('Primary Term'))</th>
                            <th>@sortView($posts,'terms')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>@id($post)</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ ucfirst($post->status) }}</td>
                                <td>
                                    @if ($post->primary_term)
                                        <span  class="badge badge-secondary">{{ $post->primary_term->title }}</span>
                                    @endif
                                </td>
                                <td>
                                    @foreach ($post->terms as $term)
                                        <span  class="badge badge-secondary">{{ $term->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('dashboard.posts.edit', ['post' => $post->id])}}" title="{{__('Edit')}}" class="dropdown-item fs-12">
                                        <i class="far fa-user-cog text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
