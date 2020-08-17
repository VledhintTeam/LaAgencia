@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('contacts.select') }}</div>

				<div class="card-body">
					<form action="" method="POST">
						@csrf
						<label>Primer columna</label>
						<input class="btn btn-default" type="submit" value="{{ __('contacts.save.selection') }}">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
