@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
			@include('settings.partial.leftbar')
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<h3>Kemaskini Profil Pertukaran</h3>
					<hr class="mb-4">
					<form method="POST" action="{{ route('profile.simpan') }}">
						@method('PUT')
						@csrf
						<div class="form-group">
							<label for="">Email address</label>
							<input type="email" class="form-control" id="" value="{{ $profile->position }}">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection