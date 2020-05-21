@extends('layouts.logged_master')

@section('content')

        <h1>General Report</h1>
            
        @if(isset($report->response))
            @foreach ($report->response as $item)
                <p>
                    <b>Currency:</b> {{ $item->currency }}<br>
                    <b>Total:</b> {{ $item->total }}<br>
                    <b>Count:</b> {{ $item->count }}<br>
                </p>
            @endforeach
        @endif

@endsection