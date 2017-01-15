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
      $transactions = Transaction::where(['campaign_id'=>$campaign_id])->get();
      $btc_current = $this->grab_currency_value('USD');
      if(count($transactions) == 0 || $transactions->sum('amount') < $campaign['daily_budget']){
        return view('claim.index',['campaign'=>$campaign,'affiliate_id'=>$affiliate_id,'campaign_id'=>$campaign_id,'btc_value'=>$btc_current['last']]);

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


    public function reward(Request $request,$affiliate_id,$campaign_id){
      $campaign = Campaign::where(['affiliate_id'=>$affiliate_id])->where(['id'=>$campaign_id])->first();
      $transactions = Transaction::where(['campaign_id'=>$campaign_id])->get();
      $btc_current = $this->grab_currency_value('USD');
      $override_amount = $request->input('amount')*0.01;
      if(count($transactions) == 0 || $transactions->sum('amount') < $campaign['daily_budget']){
        return view('claim.reward',['campaign'=>$campaign,'affiliate_id'=>$affiliate_id,'campaign_id'=>$campaign_id,'btc_value'=>$btc_current['last'],'override_amount'=>$override_amount]);

      }else{
          return redirect($campaign['url']);
      }
    }

    public function thanks(Request $request,$affiliate_id,$campaign_id){
      $campaign = Campaign::where(['affiliate_id'=>$affiliate_id])->where(['id'=>$campaign_id])->first();
      $btc_current = $this->grab_currency_value('USD');
        return view('claim.thanks',['campaign'=>$campaign,'affiliate_id'=>$affiliate_id,'campaign_id'=>$campaign_id,'btc_value'=>$btc_current['last']]);

    }
}
