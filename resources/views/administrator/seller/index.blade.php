@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @component('administrator.navbar')
                @slot('active')
                    sellers
                @endslot
            @endcomponent
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Prodajalci</div>
                <div class="list-group">
                @if (count($sellers) > 0)
                    @foreach ($sellers as $seller)
                    <a href="{{ route('administrator.seller.edit', ['id' => $seller->email]) }}" class="list-group-item">
                        <span class="badge">{{ $seller->activated ? 'aktiven' : 'neaktiven' }}</span>
                        {{ $seller->first_name }} {{ $seller->last_name }} ({{ $seller->email }})
                    </a>
                    @endforeach
                @else
                    <div class="panel-body">Ni prodajalcev.</div>
                @endif
                </div>
                <div class="panel-footer">
                   <a href="{{ route('administrator.seller.add') }}" class="btn btn-primary btn-block">Dodaj</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
