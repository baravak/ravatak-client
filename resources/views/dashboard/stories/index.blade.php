@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Stories') }} <sup>({{$stories->total()}})</sup>
            @filterBadge($stories)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($stories,'id', '#')</th>
                            <th>@sortView($stories,'story_number', __('Number'))</th>
                            <th>@sortView($stories,'title')</th>
                            <th>
                                @sortView($stories,'status', __('Status'), '<i class="fas fa-user-shield"></i>')
                                @filterView($stories, 'status')
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stories as $story)
                            <tr>
                                <td>@id($story)</td>
                                <td>{{ $story->story_number }}</td>
                                <td>{{ $story->title }}</td>
                                <td>{{ ucfirst($story->status) }}</td>
                                <td>
                                    <a href="{{route('dashboard.stories.edit', ['story' => $story->id])}}" title="{{__('Edit')}}" class="dropdown-item fs-12">
                                        <i class="far fa-user-cog text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{$stories->render()}}
            </div>
        </div>
    </div>
@endsection
