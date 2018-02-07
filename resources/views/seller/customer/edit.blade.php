@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Uredi stranko</div>
                <div class="panel-body">
                    {{ Form::model($customer, ['route' => ['seller.customer.edit', $customer->email], 'method' => 'POST']) }}
                    <div class="form-group">
                        {{ Form::label('email', 'E-postni naslov') }}
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('first_name', 'Ime') }}
                        {{ Form::text('first_name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('last_name', 'Priimek') }}
                        {{ Form::text('last_name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('home_address', 'Domaci naslov') }}
                        {{ Form::text('home_address', null, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('phone_number', 'Telefonska stevilka') }}
                        {{ Form::text('phone_number', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('new_password', 'Geslo') }}
                        {{ Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Novo geslo']) }}
                    </div>

                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('activated') }} Aktiven
                        </label>
                    </div> 
                    {{ Form::submit('Posodobi', ['class' => 'btn btn-primary btn-block']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
