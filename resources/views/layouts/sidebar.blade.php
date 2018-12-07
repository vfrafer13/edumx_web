<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">
            @include('includes.navbar')
        </div>

        <div class="main-panel" style="max-height: calc(100% - 40px); min-height: calc(100% - 40px)">
            <nav class="navbar navbar-default">
                @yield('navheader')
            </nav>

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>

</body>
@include('includes.scripts')
</html>