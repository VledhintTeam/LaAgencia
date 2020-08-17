@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('contacts.batch') }}</div>

				<div class="card-body">
					<form action="{{ route('contacts.storeBatch') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="text-center text-secondary" style="font-size: 70px;">
						<i class="fas fa-file-upload"></i>
						</div>
						<div class="form-group text-center">
							<input type="file" class="btn btn-success text-center" value="{{ __('contacts.file') }}" name="contactsfile">
						</div>
						<input class="btn btn-default" type="submit" value="Cargar archivo">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
