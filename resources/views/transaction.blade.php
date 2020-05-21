@extends('layouts.logged_master')

@section('content')

        <h1>Transaction Details</h1>
            
        @if(isset($transaction))
            <h2>{{ $transaction->transaction->merchant->transactionId }}</h2>
                <p>
                    <b>Customer Info:</b> {{ $transaction->customerInfo->billingFirstName }} {{ $transaction->customerInfo->billingLastName }}<br>
                    
                </p>
        @endif

@endsection