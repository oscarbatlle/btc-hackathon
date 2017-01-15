
@section('onReady_Scripts')
BitTastic.init();
@stop

@extends('layouts.display')

@section('content')
<div class="hero" style="height:100vh;">
   <div class="container">
      <div class="row center-align pa-m--s pt-l--s pb-xl--s ">
         <div class="col s12 m6 offset-m3">
            <div class="row">
               <img src="{{asset('images/logo-icon.svg')}}" width="60">
               <h1 class="white-text thin"> Thank You!</h1>
            </div>
            <div class="row pa-m--m pa-s--s white mt-xl--s z-depth-2">
                <h2 class="h1 tw-light">Reward Claimed</h2>

            <div class="row">
              <p>Reward Amount: ${{number_format($campaign['payout'],2)}} / {{number_format($campaign['payout']/$btc_value,6)}} ฿ </p>
            </div>
            <div class="row pl-s--s pr-s--s pb-s--s pt-s--s">
              <a class="btn deep-purple accent-2 tw-ultrabold white-text" style="width:100%;" href="Javascript:BitTastic.sendMessage('close');">
                Close Offer
              </a>
            </div>     
            </div>
          </div>
      </div>
   </div>
</div>
@endsection
