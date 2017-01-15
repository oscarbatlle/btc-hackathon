<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TrackingController extends Controller
{
    public function track()
    {
        $urlparams = Input::get();
        dd($urlparams);
    }
    
}
