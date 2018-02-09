@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Pregled narocila</div>

                <table class="table">
                    <thead>
                        <th>Ime</th>
                        <th>Kolicina</th>
                        <th>Cena</th>
                        <th>Cena skupaj</th>
                    </thead>
                    <tbody>
                        @foreach ($shoppingCartItems as $item)
                        <tr>
                            <td>{{ $item->item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->item->price }} €</td>
                            <td>{{ $item->item->price * $item->quantity }} €</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Znesek nakupa</th>
                            <td></td>
                            <td></td>
                            <td>{{ $sum }} €</td>
                        </tr>
                    </tfoot>
                </table> 
                <div class="panel-footer">
                    <a href="{{ route('shopping-cart.order.submit') }}" class="btn btn-primary btn-block">Oddaj narocilo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
