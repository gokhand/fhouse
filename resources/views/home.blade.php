@extends('layouts.master')

@section('content')

        <h1>Welcome to the Financial House Reports Test</h1>

        <div class="container-fluid" style="margin-top: 40px;">
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{ url('report') }}"><button type="button" class="btn btn-primary" ng-click="Cancel()" aria-haspopup="true" aria-expanded="false" style="width:50%"><font size="6">Report</font></button></a>
                </div>
                <div class="col-lg-6">
                    <a href="{{ url('transactions') }}"><button type="button" class="btn btn-success" ng-click="Proceed()" aria-haspopup="true" aria-expanded="false" style="width:50%"><font size="6">Transaction List</font></button></a>
                </div>
            </div>
        </div>

@endsection