@extends('welcome')

@section('content')
<div class="row">
	@foreach ($sitenewslist as $sitenews)
		<div class="col-md-6">
			Description: {{ $sitenews->description }}<br>
			Expires at: {{ $sitenews->expires_at }}<br>
		</div>
	@endforeach
</div>
@endsection