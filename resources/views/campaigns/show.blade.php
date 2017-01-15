@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $campaign->name }}</div>
                    <div class="panel-body">

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $campaign->name }}</div>
                                <div class="panel-body">
                                    <ul>
                                        <li><strong>ID:</strong> {{ $campaign->id }}</li>
                                        <li><strong>Name:</strong> {{ $campaign->name }}</li>
                                        <li><strong>Website URL</strong> {{ $campaign->url }}</li>
                                        <li><strong>Type:</strong> {{ $campaign->type }}</li>
                                        <li><strong>Daily Budget:</strong> ${{ $campaign->daily_budget }}</li>
                                        <li><strong>Payout per action:</strong> ${{ $campaign->payout }}</li>
                                        <li><strong>Description:</strong> {{ $campaign->description }}</li>
                                        <li><strong>Status:</strong> {{ $campaign->status }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Tracking</div>
                                <div class="panel-body">
                                    <ul>
                                        <li><strong>Clicks:</strong> {{ (isset($campaign->tracking()->first()->clicks)) ? : 'N/A' }}</li>
                                        <li><strong>Conversions:</strong> {{ (isset($campaign->tracking()->first()->conversions))? : 'N/A' }}</li>
                                        <li><strong>CPC:</strong> $23.21</li>
                                        <li><strong>Tracking Link:</strong></li>
                                        <div class="form-group">
                                            <textarea id="description" class="form-control" name="description" cols="30" rows="2">{{ URL::to('/') }}?aff_id={{ $campaign->affiliate()->first()->id }}&cmp={{ $campaign->id }}</textarea>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
