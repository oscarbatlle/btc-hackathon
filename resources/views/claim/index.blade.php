@extends('layouts.display')
@section('content')



<div style="background-color:#463ACA;" class="z-depth-1 pb-s--s">
  <div class="container">
    <div class="row">
      <div class="col s12 m6 white-text">
        <h3> Continue to your link </h3>
      </div>
      <div class="col s12 m6 right mt-s--s">
        <div class="row">

          <div class="col s5 pl-s--s pr-s--s">
            <a class="btn grey lighten-3 text-grey text-lighten-2 tw-ultrabold grey-text text-darken-2" style="width:100%;">
              <i class="material-icons left" style="line-height: 38px;">pause</i>Pause
            </a>
          </div>
          <div class="col s7 pl-s--s">
            <a id="continue-link" class="btn deep-purple accent-2 tw-ultrabold white-text" style="width:100%;">
              <i style="width:8px;background-color:#322a8c;height:8px;border-radius:4em;padding:1px 9px;" class="countdown mr-s--s"></i>Skip This <i class="material-icons" style="font-size:30px;">chevron_right</i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="hero-2" style="background-image:url('{{asset('images/interstitial-hero.svg')}}');">
  <div class="container">
    <div class="row">

        <div class="col s12 m5 pt-l--s">
          <div class="row">
              <img src="{{asset('images/woah.svg')}}">
          </div>
          <div class="row">
            <div class="animated-box"></div>
          </div>
        </div>
        <div class="col s12 m4  offset-m2 mt-l--s  z-depth-1">
          <div class="row white center-align pt-s--s" style="border-top-right-radius:4px;border-top-left-radius:4px;">
            <h2 class="h1 tw-light">Claim Reward</h2>
            
            <div class="row">
              <p>Reward Amount: ${{number_format($campaign['payout'],2)}} or {{number_format($campaign['payout']/$btc_value,6)}} ฿ </p>
            </div>
            <div class="row pl-s--s pr-s--s pb-s--s pt-s--s">
              <a class="btn deep-purple accent-2 tw-ultrabold white-text" style="width:100%;">
                Claim Your Reward! <i class="material-icons" style="font-size:30px;">chevron_right</i>
              </a>
            </div>
          </div>
          <div class=" pa-m--m pa-s--s" style="background-color:#5E4EFF;">
            <div class="row pa-s--s white-text" style="border:1px solid #fff;">
              <h4>New to Bitcoin?</h4>
              <p>This is real money! (maybe not a lot) but it is still holds real monetary value. Meaning YOU CAN BUY stuff. </p>
              <p>Why are we doing this you may ask? The creator of the link is giving you a reward to visit their…</p>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>
<div class="row mt-m--s">
  <div class="container">
    <div class="col s12 m6">
        <img src="{{asset('images/merchant-card.svg')}}">
    </div>
    <div class="col s12 m6 pa-m--m pa-s--s">
      <h3 class="deep-purple-text">You’ve heard about Bitcoin</h3>
      <p>Now is your chance to own some!  Follow the link below to claim your reward.</p>
      <a href="" class="btn deep-purple darken-3 white-text mt-m--s">฿ Claim Reward</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="container pa-xl--l mt-xl--l mt-xl--s  mb-l--s center-align">
      <img src="{{asset('images/logo-dark.svg')}}" width="200">
  </div>
</div>
@endsection
@section('specialjs')
<script>
  var time = 30,
    display = $('.countdown'), seconds;

  var timer = function(){
  seconds = parseInt(time % 60);
  seconds = (seconds < 10) ? "0" + seconds : seconds;

  display.text(seconds);
  if (time >=1) {
    time--;
  }

  else {
    window.clearInterval(timer);
    timer = 0;
    //window.location.href = "https://google.com";
  }
  };

  setInterval(timer, 1000);
</script>
@endsection
