<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Libs
use Auth;
use View;
use Feeds;
use Curl;

class DashboardController extends Controller
{
    public function index(){
        $feed = Feeds::make('https://news.bitcoin.com/feed/');
        $data = array(
            'title'     => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items'     => $feed->get_items(),
        );

        $channel = $feed->get_feed_tags('', 'channel');
        return view('dashboard.index',$data);
    }

    public function dash(){
      
        $user = Auth::user();
        $wallet = $user->enduserwallet()->first();
        $transactions = $user->transactions()->get();
        $btc_current = $this->grab_currency_value('USD');
        $current_wallet = $this->grab_current_wallet($wallet->hash)/10000000;
        return view('dashboard.dash', compact('wallet', 'user', 'transactions','btc_current','current_wallet'));
    }


    public static function grab_current_wallet($hash = null) {
      $response = Curl::to('https://blockchain.info/rawaddr/'.$hash)->get();
      $response = json_decode($response, true);
      return (isset($response['final_balance']))? $response['final_balance'] : 0;
    }
    public static function grab_currency_value($currency = null) {
      $response = Curl::to('https://blockchain.info/ticker')->get();
      $response = json_decode($response, true);
      if($currency != null && isset($response[$currency])){
        return $response[$currency];
      }
      return $response;
    }
}
