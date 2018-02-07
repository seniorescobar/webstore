@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Moj profil</div>
                <div class="panel-body">
                    {{ Form::model($profile, ['route' => 'administrator.profile.edit', 'method' => 'POST']) }}
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
                <div class="panel-heading">Seznam prodajalcev</div>
                <div class="list-group">
                @if (count($sellers) > 0)
                    @foreach ($sellers as $seller)
                    <a href="{{ route('administrator.seller.edit', ['id' => $seller->email]) }}" class="list-group-item">
                        <span class="badge">{{ $seller->activated ? 'aktiven' : 'neaktiven' }}</span>
                        {{ $seller->first_name }} {{ $seller->last_name }} ({{ $seller->email }})
                    </a>
                    @endforeach
                @else
                    <div class="panel-body">Ni aktivnih prodajalcev.</div>
                @endif
                </div>
                <div class="panel-footer">
                   <a href="{{ route('administrator.seller.add') }}" class="btn btn-primary btn-block">Dodaj</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
