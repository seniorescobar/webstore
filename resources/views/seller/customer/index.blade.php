@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @component('seller.navbar')
                @slot('active')
                    customers
                @endslot
            @endcomponent
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Stranke</div>
                <div class="list-group">
                @if (count($customers) > 0)
                    @foreach ($customers as $customer)
                    <a href="{{ route('seller.customer.edit', $customer->email) }}" class="list-group-item">
                        <span class="badge">{{ $customer->activated ? 'aktiven' : 'neaktiven' }}</span>
                        {{ $customer->first_name }} {{ $customer->last_name }} ({{ $customer->email }})
                    </a>
                    @endforeach
                @else
                    <div class="panel-body">Ni strank.</div>
                @endif
                </div>
                <div class="panel-footer">
                   <a href="{{ route('seller.customer.add') }}" class="btn btn-primary btn-block">Dodaj</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
