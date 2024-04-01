<nav id="navbar" class="navbar">
  <ul>
    <li><a href="{{asset('/')}}" class="active">Home</a></li>

    <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
      <ul>
        <li><a href="{{ asset('/about')}}">About</a></li>
        <li><a href="{{asset('/team')}}">Team</a></li>
        <li><a href="#">Testimonials</a></li>
<!--
        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
          <ul>
            <li><a href="#">Deep Drop Down 1</a></li>
            <li><a href="#">Deep Drop Down 2</a></li>
            <li><a href="#">Deep Drop Down 3</a></li>
            <li><a href="#">Deep Drop Down 4</a></li>
            <li><a href="#">Deep Drop Down 5</a></li>
          </ul>
        </li>
      -->
      </ul>
    </li>
    <li><a href="{{asset('/service')}}">Services</a></li>
   
    <li><a href="{{asset('/pricing')}}">Pricing</a></li>
    <li><a href="{{asset('/frontblog')}}">Blog</a></li>

    <li><a href="{{asset('/frontcontack')}}">Contact</a></li>
    <li><a href="{{asset('/frontlowongan')}}">Lowongan</a></li>
    <li><a href="{{asset('/login')}}" class="getstarted">Login Member </a></li>
  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
