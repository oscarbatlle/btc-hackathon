@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Affiliate</div>

                <div class="panel-body">
                    <form action="/affiliates" method="POST">
                        {{ csrf_field() }}
                        <h1>Company Details</h1>

                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" name="company" class="form-control" id="company">
                        </div>

                        <div class="form-group">
                            <label for="address1">Address 1</label>
                            <input type="text" name="address1" class="form-control" id="address1">
                        </div>

                        <div class="form-group">
                            <label for="address1">Address 2</label>
                            <input type="text" name="address2" class="form-control" id="address2">
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city">
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control" id="country">
                        </div>

                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" class="form-control" id="state">
                        </div>

                        <div class="form-group">
                            <label for="zip">Zip</label>
                            <input type="text" name="zip" class="form-control" id="zip">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone">
                        </div>

                        <h1>Add User</h1>

                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname">
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" name="password" class="form-control" id="pwd">
                        </div>

                        <button type="submit" class="btn btn-default pull-right">Create Affiliate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
