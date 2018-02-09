@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Dodaj izdelek</div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'seller.item.add', 'method' => 'POST', 'files' => true]) }}
                    <div class="form-group">
                        {!! Form::label('name', 'Ime') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Opis') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('price', 'Cena') !!}
                        {!! Form::number('price', null, ['class' => 'form-control']) !!}
                    </div>

                    {{ Form::submit('Dodaj', ['class' => 'btn btn-primary btn-block']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
