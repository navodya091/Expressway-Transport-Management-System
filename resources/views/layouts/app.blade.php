<!DOCTYPE html>
<html>
<head>
    <title>Expressway Transport Management System</title>

    <!-- Add the Bootstrap CSS link -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>
<body>
    <div class="container-fluid">
        <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">
              
                <span style="color: white;">Expressway</span>
                &nbsp;&nbsp;&nbsp;&nbsp; 
            </a>
            @if (Auth::check()) <!-- Check if the user is authenticated -->
                <div class="d-flex align-items-center">
                    <span>{{ Auth::user()->first_name . ' ' .Auth::user()->last_name }}</span> &nbsp;&nbsp;&nbsp;&nbsp; 
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            @endif
        </header>

        <div class="row">
        
            @include('sidebar') <!-- Include the sidebar -->
      
            <main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
                @yield('content') 
            </main>
        
        </div>
    </div>

    <!-- Add the Bootstrap JavaScript link at the end of the body -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/common.js') }}"></script>
</body>
</html>
