@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Campaign</div>

                <div class="panel-body">
                    <form action="/campaigns" method="POST">
                        {{ csrf_field() }}
                        <h1>Details</h1>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" name="description" cols="30" rows="2"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="website">Website URL</label>
                            <input type="text" name="url" class="form-control" id="url">
                        </div>

                        <div class="form-group">
                            <label for="daily_budget">Daily Budget</label>
                            <input type="text" name="daily_budget" placeholder="$" class="form-control" id="daily_budget">
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="exampleSelect1">
                                <option>CPC</option>
                                <option>CPL</option>
                            </select>
                        </div>

                        <h1>Payout</h1>
                        <div class="form-group">
                            <label for="payout">Payout per action</label>
                            <input type="text" placeholder="$1.00" name="payout" class="form-control" id="payout">
                        </div>

                        <button type="submit" class="btn btn-default pull-right">Create Campaign</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
