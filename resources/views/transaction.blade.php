@extends('layouts.master')

@section('content')

        <h1>Transaction Details</h1>
            
        @if(isset($transaction))
            <h2>{{ $transaction->transaction->merchant->transactionId }}</h2>
                <p>
                    <b>Customer Info (Billing):</b> {{ $transaction->customerInfo->billingFirstName }} {{ $transaction->customerInfo->billingLastName }}<br>
                    <b>Amount:</b> {{ $transaction->fx->merchant->originalAmount }} {{ $transaction->fx->merchant->originalCurrency }}<br>
                    <b>Merchant Id:</b> {{ $transaction->transaction->merchant->merchantId }}<br>
                    <b>Status:</b> {{ $transaction->transaction->merchant->status }}<br>
                    <b>Message:</b> {{ $transaction->transaction->merchant->message }}<br>
                    <b>Channel:</b> {{ $transaction->transaction->merchant->channel }}<br>
                    <b>Customer IP:</b> {{ $transaction->transaction->merchant->agent->customerIp }}<br>

                </p>
        @endif

@endsection