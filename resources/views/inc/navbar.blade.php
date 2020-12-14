<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  
    <ul class="nav flex-column bg-white mb-0">
        <li id="dashboard" class="nav-item">
            <a href="/dashboard" class="icon-nav nav-link text-dark font-italic">
                <img class="nav-icon" src="{{ asset('img/dashboard.png') }}">
                <p class="nav-text">Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/users" id="user" class="icon-nav nav-link text-dark font-italic">
                <img class="nav-icon" src="{{ asset('img/user.png') }}">
                <p class="nav-text">Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/projects" id="project" class="icon-nav nav-link text-dark font-italic">
                <img class="nav-icon" src="{{ asset('img/project.png') }}">
                <p class="nav-text">Projects</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/tickets" id="ticket" class="icon-nav nav-link text-dark font-italic">
                <img class="nav-icon" src="{{ asset('img/bug.png') }}">
                <p class="nav-text">Tickets</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/profile" id="profile" class="icon-nav nav-link text-dark font-italic">
                <img class="nav-icon" src="{{ asset('img/profile.png') }}">
                <p class="nav-text">Profile</p>
            </a>
        </li>
    </ul>
</div>
  <!-- End vertical navbar -->