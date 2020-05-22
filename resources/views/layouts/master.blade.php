@include('includes.top')
    @if(Session::get('tokenApi') !== null)
        @include('includes.header')
    @endif
    <div class="container">
            @yield('content')
    </div>
@include('includes.bottom')
