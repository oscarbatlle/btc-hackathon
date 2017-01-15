@extends('layouts.display')
@section('content')
@include('partials.material-navbar')
<div class="hero">
  <div class="container">
    <div class="row">
      <div class="col s12 m6 pt-l--m pl-m--s pr-m--s pb-m--s">
        <h1 class="white-text light"> Reward your visitors </h1>
        <p class="white-text">Objectively innovate empowered manufactured products whereas parallel platforms. Holisticly predominate extensible testing procedures for reliable supply chains.</p>
        <a class="waves-effect waves-light btn-large deep-purple accent-2 white-text mt-m--s pl-l--s pr-l--s"> explore </a>
        <div class="row">
          <img src="{{asset('images/graph-1.svg')}}">
        </div>
      </div>
      <div class="col s12 m4 offset-m1 mt-l--l z-depth-1 mb-m--s">
        <div class="row indigo-trans pt-m--s pb-l--s pl-l--s pr-l--s" style="border-radius:3px;">
          <div class="row center-align">
            <h3 class="tw-bold white-text">Get Started Now</h3>
          </div>
          <div class="row mt-m--s">
            <label class=" white-text ml-s--s">Email </label>
            <input type="text" name="fname" style="background-color:#8887B6;border:0 solid;border-radius:3em;">
          </div>
          <div class="row">
            <label class=" white-text ml-s--s">First Name </label>
            <input type="text" name="fname" style="background-color:#8887B6;border:0 solid;border-radius:3em;">
          </div>
          <div class="row">
            <label class=" white-text ml-s--s">Last Name </label>
            <input type="text" name="lname" style="background-color:#8887B6;border:0 solid;border-radius:3em;">
          </div>
          <div class="row">
            <a href="" class="btn-large--f mt-s--s pink lighten-1 waves-effect waves-light white-text" style="border-radius:3em;">Sign Up</a>
          </div>
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
          <h2 class="thin white-text">Let's Decentralize Together </h2>
        </div>
      </div>
    </div>
    <script src="{{asset('js/datgui.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{asset('js/smoothwave.js')}}">
    </script>
</div>
@endsection
