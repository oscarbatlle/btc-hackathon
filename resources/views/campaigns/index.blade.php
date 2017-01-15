@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Campaigns</div>

                <div class="panel-body">
                    @if(count($campaigns) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Daily Budget</th>
                                    <th>Payout</th>
                                    <th>Type</th>
                                    <th>Clicks</th>
                                    <th>Conversions</th>
                                    <th>Tracking</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($campaigns as $campaign)
                                <tr>
                                    <td>{{ $campaign->id }}</td>
                                    <td>{{ $campaign->name }}</td>
                                    <td>{{ ($campaign->status) ? 'Active' : 'Disabled' }}</td>
                                    <td>${{ $campaign->daily_budget }}</td>
                                    <td>${{ money_format('%i', $campaign->payout) }}</td>
                                    <td>{{ $campaign->type }}</td>
                                    <td>{{ (isset($campaign->tracking()->first()->clicks)) ? $campaign->tracking()->first()->clicks : 'N/A' }}</td>
                                    <td>{{ (isset($campaign->tracking()->first()->conversions))? $campaign->tracking()->first()->conversions : 'N/A' }}</td>
                                    <td><button class="btn btn-default trackmodal" id="trackmodal" data-value="{{ URL::to('/track') }}?aff_id={{ $campaign->affiliate()->first()->id }}&cmp={{ $campaign->id }}" data-toggle="modal" data-target="#trackingModal">Get tracking</button></td>
                                    <td><div class="row"><div class="col-md-6"><a target="_blank" href="/campaigns/{{ $campaign->id }}"><button class="btn btn-default">View</button></a></div><div class="col-md-6"><a target="_blank" href="/campaigns/{{ $campaign->id }}/edit"><button class="btn btn-default">Edit</button></a></div></div></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Your Campaign list is empty.</p>
                        <a href="/campaigns/create"> Create new campaign</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals.tracking')
@endsection
