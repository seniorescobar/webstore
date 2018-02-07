@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Dodaj stranko</div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'seller.customer.add', 'method' => 'POST']) }}
                    <div class="form-group">
                        {!! Form::label('email', 'E-postni naslov') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('first_name', 'Ime') !!}
                        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('last_name', 'Priimek') !!}
                        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('home_address', 'Domaci naslov') !!}
                        {!! Form::text('home_address', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone_number', 'Telefonska stevilka') !!}
                        {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Geslo') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Geslo']) !!}
                    </div>
                    
                    {{ Form::submit('Dodaj', ['class' => 'btn btn-primary btn-block']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
