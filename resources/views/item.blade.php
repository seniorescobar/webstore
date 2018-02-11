@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>{{ $item->name }} <span class="label label-default">{{ $item->price }} €</span></h4></div>
                <div class="panel-body">
                    {{ $item->description }}
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                        <div class="col-md-6">
                        <div class="dropdown">
                          <button class="btn btn-default btn-block btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Oceni z
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            @for ($r = 1; $r <= 5; $r++)
                                <li><a class="rating" data-href="{{ route('item.rate', ['id'=>$item->id, 'rating'=>$r]) }}">{{ $r }}</a></li>
                            @endfor
                          </ul>
                        </div>
                        </div>
                        <div class="col-md-6">
                    (povprecna ocena: <span id="avg-rating">{{ $item->ratings->avg('rating') }}</span>/5)
                        </div>
                        </div>
                    </li>
                </ul>
                <div class="panel-footer">
                    <a href="{{ route('shopping-cart.add', ['item_id' => $item->id]) }}" class="btn btn-primary btn-block">Dodaj v kosarico</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function() {
    $('.rating').click(function(event) {
        event.preventDefault();

        var href = $(this).attr('data-href');

        $.ajax({url: href, success: function(data){
            $('#avg-rating').text(data.avgRating);
        }});
    });
});

</script>
@endsection
