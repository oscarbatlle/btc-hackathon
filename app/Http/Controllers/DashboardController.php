<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Libs
use View;
use Feeds;

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
}
