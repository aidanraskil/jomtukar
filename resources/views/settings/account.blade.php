@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-3">
			@include('settings.partial.leftbar')
		</div>
		<div class="col-md-9">
			<div class="card mb-4">
				<div class="card-header">Tukar Katalaluan</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-8">
							<form method="post" action="{{ route('account.update') }}">
								@method('put')
								@csrf
								<div class="form-group">
									<label for="current_password" class="form-label">Katalaluan Semasa</label>
									<input id="current_password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" value="" autofocus>
									@if ($errors->has('current_password'))
										<span class="invalid-feedback">
										<strong>{{ $errors->first('current_password') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group">
									<label for="password" class="form-label">Katalaluan Baru</label>
									<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="">
									@if ($errors->has('password'))
										<span class="invalid-feedback">
										<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group">
									<label for="password_confirmation" class="form-label">Sahkan Katalaluan</label>
									<input id="password_confirmation" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="password_confirmation" value="">
									@if ($errors->has('password_confirmation'))
										<span class="invalid-feedback">
										<strong>{{ $errors->first('password_confirmation') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">KEMASKINI</button>			
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-danger mb-4">
				<div class="card-header bg-danger text-light">Padam Akaun Anda</div>
				<div class="card-body">
					Setelah dipadam, akaun anda tidak dapat dikembalikan lagi. Adakah anda pasti?
					{{ Form::open(['method' => 'DELETE', 'route' => ['account.destroy', $user->id]]) }}
						<div class="form-group mt-3">
                    		{{ Form::submit('Ya, Padam Akaun Saya', ['class' => 'btn btn-danger']) }}
                    	</div>
                    {{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection