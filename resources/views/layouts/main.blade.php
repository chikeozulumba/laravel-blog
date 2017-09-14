<!DOCTYPE html>
<html lang="en">
{{-- Head Goes here --}}
<head>
    @include('partials._head')
</head>

<body>
{{-- nav goes here --}}
    @include('partials._nav')

        <div class="container">
            <div id="body">
                        @include('partials._messages')
                <div class="container">
                    @yield('content')

                    @include('partials._footer')
                </div> <!-- End of container-->
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}</form>

        @include('partials._scripts')

        @yield('scripts')

</body>
</html>