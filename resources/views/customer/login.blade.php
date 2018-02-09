@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @component('common.navbar')
                @slot('active')
                    login
                @endslot
            @endcomponent
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Prijava</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'customer.login.submit', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{ Form::label('email', 'E-postni naslov') }}
                            {{ Form::text('email', old('email'), ['class' => 'form-control', 'autofocus']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Geslo') }}
                            {{ Form::text('password', null, ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Prijavi se', ['class' => 'btn btn-primary btn-block']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
