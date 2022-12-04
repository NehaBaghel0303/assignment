<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Work</a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link" href="#">Contact</a>
        </li>
        @auth

        @else 
        <li class="nav-item">
          <a class="nav-link login_wrapp-btn" href="">Login</a>
        </li>
        @endauth
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('user.profile.create') }}">My Profile</a>
        </li> --}}
      </ul>
    </div>
  </nav>