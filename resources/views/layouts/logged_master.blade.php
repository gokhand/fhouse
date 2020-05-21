@include('includes.top')
@include('includes.header')
    <div class="container">
        @if(Session::get('tokenApi') !== null)
            @yield('content')
        @else
            <script>window.location = "{{ url('/') }}/main";</script>
        @endif
    </div>
@include('includes.bottom')
