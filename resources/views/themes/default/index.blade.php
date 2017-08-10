@push('styles')
<link rel="stylesheet" href="/themes/default/css/style.css"/>
@endpush
@section('body')
    <header id="layout-header">
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img style="height: 21px;" src="/images/logo.png"></a></div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            {!! theme()->menu() !!}
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section>
        <h4>@yield('title')</h4>
        @yield('content')
    </section>
@endsection