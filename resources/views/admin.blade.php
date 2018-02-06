@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Moj profil</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
			@endif

			{{ Form::model(Auth::user(), ['route' => 'administrator.profile.edit', 'method' => 'POST']) }}
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
			      {!! Form::label('new_password', 'Geslo') !!}
			      {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Novo geslo']) !!}
			    </div>

				{{ Form::submit('Posodobi', ['class' => 'btn btn-primary btn-block']) }}
			{{ Form::close() }}
		</div>
            </div>
        </div>
    </div>
</div>
@endsection
