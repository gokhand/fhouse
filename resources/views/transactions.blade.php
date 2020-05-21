@extends('layouts.logged_master')

@section('content')

        <h1>Transaction List</h1>
            
        @if(isset($transactions->data))
            @foreach ($transactions->data as $item)
                <p>
                    <b>Customer Info:</b> {{ $item->customerInfo->billingFirstName }} {{ $item->customerInfo->billingLastName }}<br>
                    <b>Created Date:</b> {{ $item->updated_at }}<br>
                    <b>Transaction:</b> <a href="{{ url('/transaction') }}/{{ $item->transaction->merchant->transactionId }}">{{ $item->transaction->merchant->referenceNo }}</a><br>
                </p>
            @endforeach
        @endif

@endsection