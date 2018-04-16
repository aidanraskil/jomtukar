@extends('layouts.app')

@section('content')
<?php
	setlocale(LC_TIME, 'My');
	Carbon\Carbon::setLocale('ms');
?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="card hovercard">
				<div class="cardheader">
				</div>
				<div class="avatar text-center">
					<img alt="" src="{{ $user->avatar }}">
				</div>
				<div class="card-body text-center">
					<p><strong>{{ $user->name }}</strong></p>
				@if($user->profiles->count() > 0)
					<small>
						<p>{{ $user->profiles->first()->position }} gred {{ $user->profiles->first()->grade }} di {{ $user->profiles->first()->office }}</p>
						<p style="margin-bottom: 0;">
						{{ $user->profiles->first()->district_from }} &#8226; {{ $user->profiles->first()->statefrom->name }} <br>
						<i class="flaticon-repeat" data-toggle="tooltip" data-placement="top" title="Ingin bertukar ke"></i> <br>
						{!! $user->profiles->first()->district_to ? $user->profiles->first()->district_to.' &#8226;' : '' !!}  {{ $user->profiles->first()->stateto->name }} <br>
						</p>
					</small>
					</div>
					<div class="card-body text-center" style="padding: 1rem;border-top: 1px solid rgba(0, 0, 0, 0.125);">
						<div class="ka text-info"><h1>{{ $best_profiles->count() }}</h1></div>
						<div class="pa" style="font-size: 80%; margin-top: -0.5rem;">Padanan</div>
					</div>
					<div class="card-footer">
						{{-- <small class="text-muted text-right">Dicipta pada {{ $user->profiles->first()->created_at->diffForHumans() }}</small> --}}
					</div>
				@else
					<p>Profil pertukaran anda tidak dijumpai.</p>
				</div>
				@endif
			</div>
		</div>
		<div class="col-md-6">
			@if($user->profiles->count() > 0)
				@if($best_profiles->count() > 0 )
					<div class="card">
						<div class="card-body">
							<h3>Profil pertukaran sepadan</h3>
							<hr>
							<ul class="list-unstyled">
							@foreach($best_profiles as $profile)
								<li class="media p-2" style="border-bottom: solid #ededede;">
									<img class="mavatar align-self-center mr-3" src="/img/profilepicture.jpeg" alt="Generic placeholder image">
									<div class="media-body">
										<strong><a href="{{ route('profile.show', $profile->user->id) }}">{{ $profile->user->name }}</a></strong><br>
										<span>{{ $profile->position }} gred {{ $profile->grade }} di {{ $profile->office }}</span><br>
										<small>
											{{ $profile->district_from }} &#8226; {{ $profile->statefrom->name }}
											<span data-toggle="tooltip" data-placement="top" title="Ingin bertukar ke">&#8596;</span>
											{{ $profile->district_to }} &#8226; {{ $profile->stateto->name }}
										</small>
									</div>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
				@else
					<div class="card">
						<div class="card-body">
							<div class="card  border-info start">
								<div class="card-body text-center">
									<p class="lead" style="margin-bottom: 0;">Maaf, tiada padanan sesuai dengan profil pertukaran anda buat masa ini.</p>
								</div>
							</div>
						</div>
					</div>
				@endif
				@if($profiles->count() > 0 )
					<div class="card mt-3	">
						<div class="card-body">
							<h3>Pertukaran keluar ke negeri yang sepadan</h3>
							<hr>
							<ul class="list-unstyled">
							@foreach($profiles as $profile)
								<li class="media p-2" style="border-bottom: solid #ededede;">
									<img class="mavatar align-self-center mr-3" src="/img/profilepicture.jpeg" alt="Generic placeholder image">
									<div class="media-body">
										<strong><a href="{{ route('profile.show', $profile->user->id) }}">{{ $profile->user->name }}</a></strong><br>
										<span>{{ $profile->position }} gred {{ $profile->grade }} di {{ $profile->office }}</span><br>
										<small>
											{{ $profile->district_from }} &#8226; {{ $profile->statefrom->name }}
											<span data-toggle="tooltip" data-placement="top" title="Ingin bertukar ke">&#8596;</span>
											{{ $profile->district_to }} &#8226; {{ $profile->stateto->name }}
										</small>
									</div>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
				@endif
			@else
				<div class="card start mb-4">
					<div class="card-body text-center">
						<p class="lead">Sila cipta profil pertukaran anda terlebih dahulu. Klik butang di bawah untuk bermula.</p>
						<a href="{{ route('profile.create') }}" class="btn btn-primary">Cipta Profil Pertukaran</a>
					</div>
				</div>
			@endif
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body text-center">
					{{-- <p class="lead">Ruangan Iklan</p> --}}
				</div>
				<div class="card-footer bg-white text-center">
					<small class="text-muted">
						&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
					</small>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
