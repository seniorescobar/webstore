@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @component('seller.navbar')
                @slot('active')
                    items
                @endslot
            @endcomponent
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Izdelki</div>
                <div class="list-group">
                @if (count($items) > 0)
                    @foreach ($items as $item)
                    <a href="{{ route('seller.item.edit', $item->id) }}" class="list-group-item">
                        <span class="badge">{{ $item->activated ? 'aktiven' : 'neaktiven' }}</span>
                        {{ $item->name }}
                    </a>
                    @endforeach
                @else
                    <div class="panel-body">Ni izdelkov.</div>
                @endif
                </div>
                <div class="panel-footer">
                   <a href="{{ route('seller.item.add') }}" class="btn btn-primary btn-block">Dodaj</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
