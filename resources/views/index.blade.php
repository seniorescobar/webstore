@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach ($items as $item)
            <div class="list-group">
                <a href="{{ route('item.index', ['id' => $item->id]) }}" class="list-group-item">
                    <h4 class="list-group-item-heading">{{ $item->name }} <span class="label label-default">{{ $item->price }} €</span></h4>
                    <p class="list-group-item-text">{{ str_limit($item->description, 256) }}</p>
                </a>
            </div> 
            @endforeach
        </div>
    </div>
</div>
@endsection
