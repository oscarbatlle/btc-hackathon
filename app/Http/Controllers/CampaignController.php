<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Campaign;
use App\Models\Affiliate;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role == 'admin') {
            $campaigns = Campaign::all();
        } else {
            $affiliate = Affiliate::where('user_id', Auth::user()->id)->first();
            $campaigns = Campaign::where('affiliate_id', $affiliate->id)->get();
        }

        return view('campaigns.index', compact('campaigns'));
    }

    public function show(Campaign $campaign)
    {
        return view('campaigns.show', compact('campaign'));
    }

    public function edit(Campaign $campaign)
    {
        return view('campaigns.edit', compact('campaign'));
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request)
    {
        $affiliate = Affiliate::where('user_id', Auth::user()->id)->first();

        Campaign::create([
            'name'         => $request->input('name'),
            'type'         => $request->input('type'),
            'description'  => $request->input('description'),
            'daily_budget' => $request->input('daily_budget'),
            'payout'       => $request->input('payout'),
            'url'          => $request->input('url'),
            'affiliate_id' => $affiliate->id,
            'status'       => 1
        ]);

        return redirect('/campaigns')->withStatus('Your campaign has been created.');
    }

    public function update(Request $request, Campaign $campaign)
    {
        $campaign->update($request->all());

        return back()->withStatus('Your campaign has been updated.');
    }
    
}
