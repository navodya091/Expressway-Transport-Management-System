<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" style="{{ request()->routeIs('home') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('home') }}">
                    Home
                </a>
            </li>
            @if(auth()->user()->user_type_id === App\Models\UserType::USER_TYPE_OWNER || auth()->user()->user_type_id === App\Models\UserType::USER_TYPE_MANAGER)
                <li class="nav-item">
                    <a class="nav-link" style="{{ request()->routeIs('dashboard') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>
            @endif

            @if(auth()->user()->user_type_id === App\Models\UserType::USER_TYPE_IT_ADMIN)
                <li class="nav-item">
                    <a class="nav-link" >
                        User Management
                    </a>
                </li>
            @endif

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
                <a class="nav-link"style="{{ request()->routeIs('trip.index') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('trip.index') }}">
               
                    Trip Management
                </a>
            </li>
            @if(auth()->user()->user_type_id === App\Models\UserType::USER_TYPE_OWNER || auth()->user()->user_type_id === App\Models\UserType::USER_TYPE_MANAGER)
                <li class="nav-item">
                    <a class="nav-link" >
                
                        Report Management
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
