@guest

<nav class="navbar horizontal-navbar navbar-expand-lg navbar-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="rightNavbar navbar-nav ml-auto">
            <li id="dashboard" class="nav-item">
                <a href="/" id="login" class="icon-search icon-nav nav-link text-dark nav-text horizontal-nav-text">Login</a>
            </li>   
            <li id="dashboard" class="nav-item">
                <a href="/register" id="register" class="icon-profile icon-nav nav-link text-dark nav-text horizontal-nav-text">Register</a>
            </li>
        </ul>
    </div>
</nav>

@else

<!-- Horizontal navbar -->
<nav class="navbar horizontal-navbar navbar-expand-lg navbar-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav mr-auto">
        </ul>

            <form class="form-inline my-2 my-lg-0">
                {{-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <a href="/profile" id="profile" class="icon-search icon-nav nav-link text-dark">
                    <svg fill="#f0f0f0" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="30px" height="30px"><path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"/></svg>
                </a> --}}
            </form>

            {{-- <a id="profile" class="icon-profile icon-nav nav-link text-dark">
                <img class="nav-icon profile-icon" src="{{ asset('img/profile.png') }}">
            </a> --}}
            <a href="{{ route('logout') }}" class="horizontal-nav-text logout-margin"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    </div>
</nav>
<!-- End of horizontal navbar -->

<!-- Vertical navbar -->
<div class="vertical-nav" id="sidebar">
    <ul class="nav flex-column mb-0">
        <li id="dashboard" class="nav-item">
            <a href="/dashboard" class="icon-nav nav-link text-dark">
                <img class="nav-icon" src="{{ asset('img/dashboard.png') }}">
                <p class="nav-text">Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/users" id="user" class="icon-nav nav-link text-dark">
                <img class="nav-icon" src="{{ asset('img/user.png') }}">
                <p class="nav-text">Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/projects" id="project" class="icon-nav nav-link text-dark">
                <img class="nav-icon" src="{{ asset('img/project.png') }}">
                <p class="nav-text">Projects</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/tickets" id="ticket" class="icon-nav nav-link text-dark">
                <img class="nav-icon" src="{{ asset('img/bug.png') }}">
                <p class="nav-text">Tickets</p>
            </a>
        </li>
    </ul>
</div>
<!-- End of vertical navbar -->
@endguest