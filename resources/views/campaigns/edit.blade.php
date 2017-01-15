@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Campaign</div>

                <div class="panel-body">
                    <form action="/campaigns/{{ $campaign->id }}" method="POST">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <h1>Details</h1>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $campaign->name }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" name="description" cols="30" rows="2">{{ $campaign->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="website">Website URL</label>
                            <input type="text" name="url" class="form-control" id="url" value="{{ $campaign->url }}">
                        </div>

                        <div class="form-group">
                            <label for="daily_budget">Daily Budget</label>
                            <input type="text" name="daily_budget" placeholder="$" class="form-control" id="daily_budget" value="{{ $campaign->daily_budget }}">
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="exampleSelect1" value="{{ $campaign->type }}">
                                <option value="CPC">CPC</option>
                                <option value="CPL">CPL</option>
                            </select>
                        </div>

                        <h1>Payout</h1>
                        <div class="form-group">
                            <label for="payout">Payout per action</label>
                            <input type="text" placeholder="$1.00" name="payout" class="form-control" id="payout" value="{{ $campaign->payout }}">
                        </div>

                        <button type="submit" class="btn btn-default pull-right">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
