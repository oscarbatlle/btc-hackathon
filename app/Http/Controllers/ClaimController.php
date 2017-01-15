<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Libs
use View;
use Feeds;
use Curl;


//Models
use App\Models\Campaign;
use App\Models\Affiliate;
use App\Models\Transaction;




class ClaimController extends Controller
{
    public function index(Request $request,$affiliate_id,$campaign_id){
      $campaign = Campaign::where(['affiliate_id'=>$affiliate_id])->where(['id'=>$campaign_id])->first();
      $transactions = $campaign->transaction()->get();
      $btc_current = $this->grab_currency_value('USD');
      if(count($transactions) == 0 || $transaction->sum('amount') < $campaign['daily_budget']){
        return view('claim.index',['campaign'=>$campaign,'btc_value'=>$btc_current['last']]);

      }else{
          return redirect($campaign['url']);
      }
    }

    public static function grab_currency_value($currency = null) {
      $response = Curl::to('https://blockchain.info/ticker')->get();
      $response = json_decode($response, true);
      if($currency != null && isset($response[$currency])){
        return $response[$currency];
      }
      return $response;
    }


    public static function thankyou($hash) {

      $data['amount'] = "0.005";
      $data['hash'] = "1JfBpkfBSfqWRVw5X2b5yJgYGrGuTgFazy";


      return view('claim.thankyou', ["data" => $data]);

    }
}
