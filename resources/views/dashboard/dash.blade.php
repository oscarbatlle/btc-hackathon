@extends('layouts.display')
@section('content')
@include("partials.material-navbar")
   <div id="dashboard" class="row">
      <div style="width:25%;float:left;height:100vh;background-color:#1C2237;" class="z-depth-1">
         <ul>
            <li style="width:100%;" class="center-align pa-m--s white-text dash-navis active"><i class="material-icons ">dashboard</i> DASHBOARD</li>
            <li style="width:100%;" class="center-align pa-m--s white-text dash-navis"><i class="material-icons ">fiber_new</i> WHATS NEW</li>
            <li style="width:100%;" class="center-align pa-m--s white-text dash-navis"><i class="material-icons ">message</i> BITCOIN NEWS</li>
            <li style="width:100%;" class="center-align pa-m--s white-text dash-navis"><i class="material-icons ">settings</i> SETTINGS</li>
         </ul>
      </div>
      <div style="width:20%;float:left;height:100vh;background-color:#1F2740;">
         <div id="dashboard">
            <a href="wallet" data-navigo>
               <div id="wallet-init" style="width:100%;" class="pa-l--s center-align white-text sub-dash-navis active ">
                  WALLET
               </div>
            </a>
            <a href="account" data-navigo>
               <div id="account-init" style="width:100%;" class="pa-l--s center-align white-text sub-dash-navis">
                  MY ACCOUNT
               </div>
            </a>
            <a href="atm" data-navigo>
               <div id="atm-init" style="width:100%;" class="pa-l--s center-align white-text sub-dash-navis">
                  FIND AN ATM
               </div>
            </a>
         </div>
      </div>
      <div style="width:55%;float:left;height:100vh;background-color:#F3F3F3;" >
         <div id="wallet" class="hide pa-m--s">
            <div class="row white z-depth-2 pa-m--s">
               <div class="row">
                  <div class="col s7">
                     <h2 class="thin">Receive Money</h2>
                  </div>
                  <div class="col s5">
                     <div class="row  center-align">
                        <h3>BTC 5.0323</h3>
                        <p class="pink-text">USD 4,4994.57</p>
                     </div>
                  </div>
               </div>
               <div class="row mt-m--m">
                  <h4>Wallet Address</h4>
                  <input type="text" style="width:100%;" value="928d9v6ssd86zxz90jmsdalk99s9">
               </div>
            </div>
            <div class="row white z-depth-2 pa-m--s mt-m--m">
               <div class="col s6">
                  <h4>BITCOIN PRICE:</h4>
               </div>
               <div class="col s6">
                  <h4 class="right-align pink-text">USD 863.07</h4>
               </div>
            </div>
            <div class="row white z-depth-2 pa-m--s mt-m--m">
               <div class="row">
                  <h3>Latest Transactions</h3>
               </div>
               <div class="row">
                  <table class="striped">
                     <thead>
                        <tr>
                           <th data-field="id">Name</th>

                           <th data-field="price">Item Price</th>
                        </tr>
                     </thead>

                     <tbody>
                        <tr>
                           <td>Alvin</td>
                           <td>$0.87</td>
                        </tr>
                        <tr>
                           <td>Alan</td>
                           <td>$3.76</td>
                        </tr>
                        <tr>
                           <td>Jonathan</td>
                           <td>$7.00</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div id="account" class="hide">
            hi
         </div>
         <div id="atm" class="hide">
            <div class="row pa-m--s z-depth-1">
               <div class="video-container">
                  <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=bitstop&key=AIzaSyBtbZ0_FRp0pQ6Puh0PNYv5pkrKN4MxY8w" allowfullscreen></iframe>
               </div>
            </div>
         </div>
      </div>
   </div>
@section("specialjs")
   <script>
      $(document).ready(function(){
         var router = new Navigo(root = null, useHash = true);
         var router_pathname = location.pathname;
         if (location.hash == '') {
             router.navigate('wallet');
         }
         console.log("helli");
         router
          .on(":id", function(params) {
              console.log(params);
              $("#wallet, #account,#atm").addClass("hide");
              $("#wallet-init, #account-init,#atm-init").removeClass("active");
              $(params.id).removeClass("hide");
              $(params.id+"-init").addClass("active");
          })
          .resolve();

      });

   </script>
@endsection
@endsection
