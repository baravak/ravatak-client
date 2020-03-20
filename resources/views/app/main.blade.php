@section('main')
    <main class="flex-grow-1">
        <header class="header mb-5">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <h1 class="mb-0">
                        <a class="navbar-brand" href="{{route('home')}}">رواتک</a>
                        <small class="navbar-description d-none d-md-inline" data-xhr="sub-title">@yield('sub-title', 'مجموعه خرده روایت‌ها')</small>
                    </h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{config('app.url')}}">صفحه نخست <span class="sr-only">(فعلی)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" style="color: #d85999;" href="{{route('termPost.index', 'COVID19')}}">ویژه کرونا</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about-us">درباره ما</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div class="container-xs">
            <div class="posts" data-xhr="container-xs-posts">
                @yield('content')
            </div>
        </div>
    </main>
    <footer class="py-5">
        <div class="text-center text-secondary h5">رواتک</div>
        <div class="text-center text-secondary">مجموعه خرده روایت‌ها</div>
    </footer>
@endsection
