<div class="navbar-fixed">
<nav style="background-color:#232453;" class="z-depth-1">
  <div class="container">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><img src="{{asset('images/logo.svg')}}"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="/">HOME</a></li>
        <li><a href="/">BIT COIN NEWS</a></li>
        @if (Route::has('login'))
          @if (Auth::check())
              <a href="{{ url('/home') }}">DASH</a>
          @else
              <a href="{{ url('/login') }}">LOGIN</a>
              <a href="{{ url('/register') }}">REGISTER</a>
          @endif
        @endif
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="/">HOME</a></li>
        <li><a href="/">BITCOIN NEWS</a></li>
        @if (Route::has('login'))
          @if (Auth::check())
              <a href="{{ url('/home') }}">DASH</a>
          @else
              <a href="{{ url('/login') }}">LOGIN</a>
              <a href="{{ url('/register') }}">REGISTER</a>
          @endif
        @endif
      </ul>
    </div>
  </div>
</nav>
</div>
