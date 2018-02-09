@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>{{ $item->name }} <span class="label label-default">{{ $item->price }} €</span></h4></div>
                <div class="panel-body">{{ $item->description }}</div>
                {{--<ul class="list-group">
                    <li class="list-group-item">Oceni z: 
                    @for ($r = 1; $r <= 5; $r++)
                        <a href="{{ route('item.rate', ['id'=>$item->id, 'rating'=>$r]) }}">{{ $r }}</a>
                    @endfor
                    (povprecna ocena: {{ $item->ratings->avg('rating') }}/5)
                    </li>
                </ul>--}}
                <div class="panel-footer">
                    <a href="{{ route('shopping-cart.add', ['item_id' => $item->id]) }}" class="btn btn-primary btn-block">Dodaj v kosarico</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
