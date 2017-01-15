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
               <h2 class="deep-purple-text text-darken-4">Claim your Bitcoin </h2>
               <img src="{{asset('images/qr.svg')}}" width="160">
               <h4> ฿ 0.0012 </h4>
               <input type="text" value="1933phfhK3ZgFQNLGSDXvqCn32k2buXY8a">
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
