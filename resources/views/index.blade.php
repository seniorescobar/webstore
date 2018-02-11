@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="list-group">
        @foreach ($items as $item)


                <a href="{{ route('item.index', ['id' => $item->id]) }}" class="list-group-item">
                    <h4 class="list-group-item-heading">{{ $item->name }}</h4>
                    <p class="list-group-item-text">{{ str_limit($item->description, 128) }}</p>
                </a>
            @endforeach
            </div> 
        </div>
    </div>
</div>
@endsection
