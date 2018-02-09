@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @component('customer.navbar')
                @slot('active')
                    shopping-cart
                @endslot
            @endcomponent
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Kosarica</div>
                @if (count($shoppingCartItems) > 0)
                <table class="table">
                    <thead>
                        <th>Ime</th>
                        <th>Cena</th>
                        <th>Kolicina</th>
                    </thead>
                    <tbody>
                        @foreach ($shoppingCartItems as $item)
                        <tr>
                            <td>
                                <a href="{{ route('item.index', ['id' => $item->item_id]) }}">
                                    {{ $item->item->name }}
                                </a>
                            </td>
                            <td>{{ $item->item->price }} €</td>
                            <td>
                                <a href="{{ route('shopping-cart.edit', ['item_id' => $item->item_id]) }}">
                                    {{ $item->quantity }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
                <div class="panel-footer">
                    <a href="{{ route('shopping-cart.order') }}" class="btn btn-primary btn-block">Preglej narocilo</a>
                </div>
                @else
                <div class="panel-body">Kosarica je prazna.</div>
               @endif 
            </div>
        </div>
    </div>
</div>
@endsection
