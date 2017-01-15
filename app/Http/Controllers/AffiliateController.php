<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use App\Models\Affiliate;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $affiliates = Affiliate::all();

        return view('affiliates.index', compact('affiliates'));
    }
    
    public function create()
    {
        return view('affiliates.create');
    }
    
    public function store(Request $request)
    {

        $user = User::create([
            'name'     => $request->input('firstname') . ' ' . $request->input('lastname'),
            'email'    => $request->input('email'),
            'password'  => Hash::make($request->input('password'))
        ]);

        Affiliate::create([
            'company'   => $request->input('company'),
            'address1'  => $request->input('address1'),
            'address2'  => $request->input('address2'),
            'city'      => $request->input('city'),
            'country'   => $request->input('country'),
            'state'     => $request->input('state'),
            'zip'       => $request->input('zip'),
            'phone'     => $request->input('phone'),
            'user_id'   => $user->id,
            'status'    => 1
        ]);

        return redirect('/affiliates')->withStatus('Your Affiliate has been created.');

    }
    
}
