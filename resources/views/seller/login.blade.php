
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @component('common.navbar')
                @slot('active')
                    seller
                @endslot
            @endcomponent
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Prijava</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'seller.login.submit', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{ Form::label('email', 'E-postni naslov') }}
                            {{ Form::text('email', old('email'), ['class' => 'form-control', 'autofocus']) }}
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Geslo</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Prijava</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
