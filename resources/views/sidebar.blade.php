<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" style="{{ request()->routeIs('home') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="{{ request()->routeIs('dashboard') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="{{ request()->routeIs('bus.index') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('bus.index') }}">
                    Bus Information
                </a>
            </li>
  
            <li class="nav-item">
                <a class="nav-link" style="{{ request()->routeIs('route.index') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('route.index') }}"> 
                 
                    Route Management
                </a>
            </li>
    
            <li class="nav-item">
                <a class="nav-link">
               
                    Trip Management
                </a>
            </li>
  
            <li class="nav-item">
                <a class="nav-link" >
             
                    Report Management
                </a>
            </li>
        </ul>
    </div>
</nav>
