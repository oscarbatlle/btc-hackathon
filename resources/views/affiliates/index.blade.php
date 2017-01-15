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
                <div class="panel-heading">Affiliates</div>

                <div class="panel-body">
                    @if(count($affiliates) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Campaigns</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($affiliates as $affiliate)
                                <tr>
                                    <td>{{ $affiliate->company }}</td>
                                    <td>{{ ($affiliate->status) ? 'Active' : 'Disabled'}}</td>
                                    <td>{{ $affiliate->campaign()->count() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Your affiliate list is empty.</p>
                        <a href="/affiliates/create"> Add new affiliate</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
