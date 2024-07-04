@props(['message' => 'hello'])
{{ $message }}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
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
        <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
            <x-nav-link href="/profile">
                My Profile 
            </x-nav-link>
        </li>
        <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
            <x-nav-link href="/register">
                Register
            </x-nav-link>
        </li>
        <li class="nav-item {{ request()->is('/crypto') ? 'active' : '' }}">
            <x-nav-link href="/crypto">
                Single Crypto
            </x-nav-link>
        </li>
        <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
            <x-nav-link href="/cryptocurrency">
                Login
            </x-nav-link>
        </li>
    </ul>
  </div>
</nav>