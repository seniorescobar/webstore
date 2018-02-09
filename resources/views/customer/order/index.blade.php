@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @component('customer.navbar')
                @slot('active')
                    orders
                @endslot
            @endcomponent
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Moja narocila</div>
                <div class="list-group">
                @if (count($orders) > 0)
                    @foreach ($orders as $order)
                    <a href="{{ route('customer.order.show', ['id' => $order->id]) }}" class="list-group-item">
                        <span class="badge">{{ $order->status_id }}</span>
                        {{ $order->id }}
                    </a>
                    @endforeach
                @else
                    <div class="panel-body">Ni narocil.</div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
