@extends('welcome')

@section('content')
<h1>Create New Site News</h1>

<div class="row">
	<div class="col-md-6 col-offset-4">
		{!! Form::model($sitenews, ['action'=>'SitenewsController@store']) !!}
			<div class="form-group">
				{!! Form::label('description', 'Description') !!}
				{!! Form::text('description', '', ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('expires_at', 'Expires on...') !!}
				{!! Form::date('expires_at', Carbon\Carbon::now(), ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('alert_Orupdate', 'Site news type:') !!}
				{!! Form::select('alert_Orupdate', [true=>'alert', false=>'update'], ['class'=>'form-control']) !!}
			</div>

			{!! Form::submit('Save') !!}
		{!! Form::close() !!}
	</div>
</div>
@endsection