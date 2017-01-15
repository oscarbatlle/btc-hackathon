@extends('layouts.display')
@section('content')
<div class="navbar-fixed">
<nav style="background-color:#232453;" class="z-depth-1">
  <div class="container">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><img src="{{asset('images/logo.svg')}}"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
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
<div class="hero">
  <div class="container">
    <div class="row">
      <div class="col s12 m6 pt-l--m pl-m--s pr-m--s pb-m--s">
        <h1 class="white-text light"> Reward Positive Interactions with Bitcoin</h1>
        <p class="white-text">Earn Bitcoins for doing things you already do!
        <br/><br/>
              - BTC Cash Back (1% Traditional Payment Methods, 1.5% BTC Payments)<br/>
              - Taking Surveys<br/>
              - Referal Links<br/>
        </p>
        <div class="row">
          <img src="{{asset('images/graph-1.svg')}}">
        </div>
      </div>
      <div class="col s12 m4 offset-m1 mt-l--l z-depth-1 mb-m--s">
        <div class="row indigo-trans pt-m--s pb-l--s pl-l--s pr-l--s" style="border-radius:3px;">
          <div class="row center-align">
            <h3 class="light white-text">Get Started Now</h3>
          </div>
          <form action="/register" method="POST">
            {{ csrf_field() }}
              <div class="row mt-m--s">
                <label for="email" class="white-text ml-s--s">Email </label>
                <input type="text" id="email" name="email" style="background-color:#8887B6;border:0 solid;border-radius:3em;">
              </div>
              <div class="row">
                <label for="name" class="white-text ml-s--s">Name </label>
                <input type="text" id="name" name="name" style="background-color:#8887B6;border:0 solid;border-radius:3em;">
              </div>
              <div class="row">
                <label for="password" class="white-text ml-s--s">Password </label>
                <input type="password" id="password" name="password" style="background-color:#8887B6;border:0 solid;border-radius:3em;">
              </div>
              <div class="row">
                <button type="submit" class="btn-large--f mt-s--s pink lighten-1 waves-effect waves-light white-text" style="border-radius:3em;">Sign Up</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <canvas id="myCanvas">
      Sorry, your browser does not allow canvas element.
      Update to a newer one for gods sake!!!!
    </canvas>
    <div class="row">
      <div class="container center-align">
        <div class="decentralize-text">
          <h2 class="thin white-text ">Earning Bitcoins has never been simpler. </h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="container pt-l--s">

        <h2 class="mb-l--s">Bitcoin in the News</h2>
        @foreach ($items as $item)
          <div class="item row mb-l--s article-post">
            <h4><a class="tw-normal black-text highlight" href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a></h4>
                 <p><?php print_R($item->get_description());?></p>

            <p><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
          </div>
        @endforeach
      </div>
    </div>
    <div class="row">
      <div class="container pa-xl--l mt-xl--l mt-xl--s  mb-l--s center-align">
          <img src="{{asset('images/logo-dark.svg')}}" width="200">
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{asset('js/datgui.js')}}"></script>
<script src="{{asset('js/smoothwave.js')}}">
</script>
</div>
@endsection
