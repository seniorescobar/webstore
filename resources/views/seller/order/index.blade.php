@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @component('seller.navbar')
                @slot('active')
                    orders
                @endslot
            @endcomponent
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Oddana narocila</div>
                @if (count($submittedOrders) > 0)
                <div class="list-group">
                    @foreach ($submittedOrders as $order)
                    <a class="list-group-item" href="{{ route('seller.order.show', ['id' => $order->id]) }}">
                        {{ $order->id }}
                    </a>
                    @endforeach
                </div>
                @else
                <div class="panel-body">Ni oddanih narocil.</div>
                @endif
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Potrjena narocila</div>

                @if (count($approvedOrders) > 0)
                <div class="list-group">
                    @foreach ($approvedOrders as $order)
                    <a class="list-group-item" href="{{ route('seller.order.show', ['id' => $order->id]) }}">
                        {{ $order->id }}
                    </a>
                    @endforeach
                </div>
                @else
                <div class="panel-body">Ni potrjenih narocil.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
