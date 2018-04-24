@extends('layouts.app')

@section('content')
<?php
	setlocale(LC_TIME, 'My');
	Carbon\Carbon::setLocale('ms');
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-3">
			@include('settings.partial.leftbar')
		</div>
		<div class="col-md-9">
			<div class="card mb-4">
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
								<div class="form-group">
									<label for="phone" class="form-label">No. telefon untuk dihubungi</label>
									<input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" autofocus>
									@if ($errors->has('phone'))
										<span class="invalid-feedback">
										<strong>{{ $errors->first('phone') }}</strong>
										</span>
									@endif
								</div>
								<button type="submit" class="btn btn-primary">KEMASKINI</button>
							</form>
						</div>
						<div class="col-md-4">
							<form id="gam" method="POST" action="{{ route('picture') }}" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label for="photo" class="form-label">Gambar Profil</label><br>
									<img id="avatar" src="{{ $user->avatar }}" class="figure-img img-fluid rounded" alt="">
									<div class="custom-file" id="customFile" lang="es">
										<input type="file" name="avatar" class="custom-file-input" id="photo" onchange="readURL(this);submitForm();">
										<label class="custom-file-label" for="exampleInputFile">
										Pilih gambar...
										</label>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-header">
					Profil Pertukaran
				</div>
				@if($user->profiles->count() > 0)
					<div class="list-group list-group-flush">
						@foreach($user->profiles as $profile)
							<a href="{{ route('profile.kemaskini') }}" class="list-group-item">
								{{ $profile->position }} &nbsp; <span class="badge badge-primary" title="Status">{{ $profile->status }}</span> <span class="float-right">dicipta pada {{ $profile->created_at->diffForHumans() }}</span>
							</a>
						@endforeach
					</div>
				@else
					<div class="card-body text-center">
						<p class="lead">Profil pertukaran anda tidak dijumpai</p>
						<a href="{{ route('profile.create') }}" class="btn btn-primary">Cipta Profil Pertukaran</a>
					</div>
				@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
 	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function submitForm()
	{
	    $('#gam').submit();
	}
</script>
@endsection
