@extends('layouts.display')
@section('content')
<div class="hero" style="height:100vh;">
   <div class="container">
      <div class="row center-align pa-m--s pt-l--s pb-xl--s ">
         <div class="col s12 m6 offset-m3">
            <div class="row">
               <img src="{{asset('images/logo-icon.svg')}}" width="60">
               <h1 class="white-text thin"> Thank You!</h1>
               <hr />
               <h4 class="white-text mt-m--s"> Our Gift to You </h4>
            </div>
            <div class="row pa-m--m pa-s--s white mt-xl--s z-depth-2">
                <h2 class="h1 tw-light">Claim Reward</h2>

            <div class="row">
              @if($override_amount != null)
              <p>Reward Amount: ${{number_format($override_amount,2)}} / {{number_format($override_amount/$btc_value,6)}} ฿ </p>
              @else
              <p>Reward Amount: ${{number_format($campaign['payout'],2)}} / {{number_format($campaign['payout']/$btc_value,6)}} ฿ </p>
              @endif
            </div>
            <div class="row pl-s--s pr-s--s pb-s--s pt-s--s">
              <a class="btn deep-purple accent-2 tw-ultrabold white-text" style="width:100%;" href="/success/{{$affiliate_id}}/{{$campaign_id}}?thankyou=true">
                Claim Your Reward! <i class="material-icons" style="font-size:30px;">chevron_right</i>
              </a>
            </div>     
            </div>
          </div>
      </div>
   </div>
</div>
@endsection
