@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Moj profil</div>
                <div class="panel-body">
                    {{ Form::model($profile, ['route' => 'seller.profile.edit', 'method' => 'POST']) }}
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
                        {{ Form::label('new_password', 'Geslo') }}
                        {{ Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Novo geslo']) }}
                    </div>

                    {{ Form::submit('Posodobi', ['class' => 'btn btn-primary btn-block']) }}
                    {{ Form::close() }}
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Seznam strank</div>
                <div class="list-group">
                @if (count($customers) > 0)
                    @foreach ($customers as $customer)
                    <a href="{{ route('seller.customer.edit', $customer->email) }}" class="list-group-item">
                        <span class="badge">{{ $customer->activated ? 'aktiven' : 'neaktiven' }}</span>
                        {{ $customer->first_name }} {{ $customer->last_name }} ({{ $customer->email }})
                    </a>
                    @endforeach
                @else
                    <div class="panel-body">Ni strank.</div>
                @endif
                </div>
                <div class="panel-footer">
                   <a href="{{ route('seller.customer.add') }}" class="btn btn-primary btn-block">Dodaj</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
