@extends('layouts.logged_master')

@section('content')

        <h1>Transaction List</h1>
            
        @if(isset($transactions->data))
            @foreach ($transactions->data as $item)
            <p>
                <b>Customer Info:</b> @if(isset($item->customerInfo)){{ $item->customerInfo->billingFirstName }} {{ $item->customerInfo->billingLastName }}@endif<br>
                <b>Merchant:</b> {{ $item->merchant->name }} <br>
                <b>Created Date:</b> {{ $item->updated_at }}<br>
                <b>Amount:</b> {{ $item->fx->merchant->originalAmount }} {{ $item->fx->merchant->originalCurrency }}<br>
                <b>Transaction:</b> <a href="{{ url('/transaction') }}/{{ $item->transaction->merchant->transactionId }}">{{ $item->transaction->merchant->referenceNo }}</a> {{ $item->transaction->merchant->status }}<br>
            </p>
            @endforeach
        @endif

        @if(isset($current_page))
        @php
            $prev = $current_page - 1;
            $next = $current_page + 1;
        @endphp
        <ul class="pager">
            @if(($has_next_page == true) && ($has_previous_page == false))
                    <li><a href="{{url('transactions/'.$next)}}">Next ></a></li>
            @elseif(($has_next_page == false) && ($has_previous_page == true))
                    <li><a href="{{url('transactions/'.$prev)}}">< Previous</a></li>
            @elseif(($has_next_page == true) && ($has_previous_page == true))
                    <li><a href="{{url('transactions/'.$prev)}}">< Previous</a></li><li><a href="{{url('transactions/'.$next)}}">Next ></a></li>
            @endif
        </ul>
    @endif

@endsection