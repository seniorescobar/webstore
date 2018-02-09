@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $item->item->name }}</div>
                <div class="panel-body">
                    {{ Form::model($item, ['route' => ['shopping-cart.edit', 'item_id' => $item->item_id], 'method' => 'POST']) }}
                    <div class="form-group">
                        {{ Form::label('quantity', 'Kolicina') }}
                        {{ Form::text('quantity', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::submit('Posodobi', ['class' => 'btn btn-primary btn-block']) }}
                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    <a href="{{ route('shopping-cart.remove', ['item_id' => $item->item_id]) }}" class="btn btn-danger btn-block">Odstrani</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
