@include('includes.top')
    <div class="container">
        @if(Session::get('tokenApi') == null)
            @yield('content')
        @else
            <script>window.location = "{{ url('/') }}/home";</script>
        @endif
    </div>
@include('includes.bottom')
