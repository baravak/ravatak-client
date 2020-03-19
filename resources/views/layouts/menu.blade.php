@section('default-menu')
@parent
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.stories.index')}}">
            <span class="d-sm-inline">{{__('Stories')}}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.posts.index')}}">
            <span class="d-sm-inline">{{__('Posts')}}</span>
        </a>
    </li>

@endsection
@include('layouts.default-menu')
