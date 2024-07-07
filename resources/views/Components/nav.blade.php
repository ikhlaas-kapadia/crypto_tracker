
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/"><i class="fa-brands fa-btc" aria-hidden="true"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
            <x-nav-link href="/">
                Home 
            </x-nav-link>
        </li>

        <li class="nav-item {{ request()->is('portfolio') ? 'active' : '' }}">
            <x-nav-link href="/portfolio">
                Portfolio 
            </x-nav-link>
        </li>
        @if(! Auth::user())
        <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
            <x-nav-link href="{{route('register')}}" class="register-btn">
               Register
            </x-nav-link>
        </li>
        <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
            <x-nav-link href="{{route('login')}}" class="login-link">
                Login
            </x-nav-link>
        </li>
        @endif

        
    </ul>
  </div>

</nav>