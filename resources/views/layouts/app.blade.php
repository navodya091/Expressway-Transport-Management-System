<!DOCTYPE html>
<html>
<head>
    <title>Expressway Transport Management System</title>

    <!-- Add the Bootstrap CSS link -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">
                <!-- Add your common heading with matching colors and space -->
                <span style="color: white;">Expressway Transport</span>
                &nbsp;&nbsp;&nbsp;&nbsp; <!-- Add extra spaces as needed -->
            </a>
            <div class="text-end"> <!-- Add this div for right alignment -->
                @if(Auth::check()) <!-- Check if user is authenticated -->
                    <a href="" class="btn btn-danger">Logout</a>
                @else
                    <a href="" class="btn btn-primary">Login</a>
                @endif
            </div>
        </header>

        <div class="row">
        
            @include('sidebar') <!-- Include the sidebar -->
      
            <main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
                @yield('content') <!-- This is where your content goes -->
            </main>
        
        </div>
    </div>

    <!-- Add the Bootstrap JavaScript link at the end of the body -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
