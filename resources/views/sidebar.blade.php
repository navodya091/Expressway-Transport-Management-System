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

            @if(auth()->user()->user_type_id === App\Models\UserType::USER_TYPE_IT_ADMIN || App\Models\UserType::USER_TYPE_OWNER || auth()->user()->user_type_id === App\Models\UserType::USER_TYPE_MANAGER)
                <li class="nav-item">
                    <a class="nav-link" style="{{ request()->routeIs('user.index') || request()->routeIs('user.create') || request()->routeIs('user.edit') || request()->routeIs('user.show') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('user.index') }}" >
                        User Management
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" style="{{ request()->routeIs('bus.index')|| request()->routeIs('bus.create') || request()->routeIs('bus.edit') || request()->routeIs('bus.show') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('bus.index') }}">
                    Bus Management
                </a>
            </li>
  
            <li class="nav-item">
                <a class="nav-link" style="{{ request()->routeIs('route.index')|| request()->routeIs('route.create') || request()->routeIs('route.edit') || request()->routeIs('route.show') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('route.index') }}"> 
                 
                    Route Management
                </a>
            </li>
    
            <li class="nav-item">
                <a class="nav-link"style="{{ request()->routeIs('trip.index') || request()->routeIs('trip.create') || request()->routeIs('trip.edit') || request()->routeIs('trip.show') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('trip.index') }}">
               
                    Trip Management
                </a>
            </li>
            @if(auth()->user()->user_type_id === App\Models\UserType::USER_TYPE_OWNER || auth()->user()->user_type_id === App\Models\UserType::USER_TYPE_MANAGER)
                <li class="nav-item">
                    <a class="nav-link" style="{{ request()->routeIs('report.index') ? 'color: red; font-weight: bold;' : '' }}" href="{{ route('report.index') }}">
                
                        Report Generation
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
