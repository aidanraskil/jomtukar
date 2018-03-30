@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-3">
			<div class="card">
			<div class="card-header">Tetapan</div>
				<div class="list-group list-group-flush">
					<a href="#" class="list-group-item active">Profil</a>
					<a href="#" class="list-group-item">Keselamatan</a>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-header">Maklumat Untuk Dihubungi</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-8">
							<form method="post" action="{{ route('profile.update') }}">
								@method('PUT')
								@csrf
								<div class="form-group">
									<label for="name" class="form-label">Nama</label>
									<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" autofocus>
									@if ($errors->has('name'))
										<span class="invalid-feedback">
										<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group">
									<label for="email" class="form-label">Email</label>
									<input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}">
									@if ($errors->has('email'))
										<span class="invalid-feedback">
										<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
								<button type="submit" class="btn btn-primary">KEMASKINI</button>
							</form>
						</div>
						<div class="col-md-4">
							<form method="POST" action="{{ route('picture') }}">
								@csrf
								<div class="form-group">
									<label for="photo" class="form-label">Gambar Profil</label>
									<img src="https://spark.laravel.com/storage/profiles/IER8ef8QpwKd46uFlnP6tEc6mcLp92i5WA2ad40M.jpeg" class="figure-img img-fluid rounded" alt="">
									<div class="custom-file" id="customFile" lang="es">
										<input type="file" class="custom-file-input" id="photo">
										<label class="custom-file-label" for="exampleInputFile">
										Pilih gambar...
										</label>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
