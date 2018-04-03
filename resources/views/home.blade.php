@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="card hovercard">
				<div class="cardheader">
				</div>
				<div class="avatar text-center">
					<img alt="" src="/img/profilepicture.jpeg">
				</div>
				<div class="card-body text-center">
					<p><strong>{{ $user->name }}</strong></p>
				@if($user->profiles->count() > 0)
					<small>
						{{ $user->profiles->first()->position }} - {{ $user->profiles->first()->grade }} di {{ $user->profiles->first()->office }} <br>
						{{ $user->profiles->first()->district_from }} &#8226; {{ $user->profiles->first()->statefrom->name }}
					</small>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<span>Jawatan</span> <span class="float-right">{{ $user->profiles->first()->position }}</span>
						</li>
						<li class="list-group-item">
							<span>Gred</span> <span class="float-right">{{ $user->profiles->first()->grade }}</span>
						</li>
						<li class="list-group-item">
							<span>Lokasi semasa</span> <span class="float-right">{{ $user->profiles->first()->district_from }}, {{ $user->profiles->first()->statefrom->name }}</span>
						</li>
						<li class="list-group-item">
							<span>Lokasi diingini</span> <span class="float-right">{{ $user->profiles->first()->district_to ? $user->profiles->first()->district_to.', ' : '' }} {{ $user->profiles->first()->stateto->name }}</span>
						</li>
					</ul>
					<div class="card-footer" style="border-top: none;">
						<small class="text-muted text-right">Dipos pada {{ $user->profiles->first()->created_at->diffForHumans() }}</small>
					</div>
				@else
					<p>Profil pertukaran anda tidak dijumpai.</p>
					<p>Sila klik <a href="{{ route('profile.create') }}" class="text-primary">di sini</a> untuk mencipta profil pertukaran anda.</p>
				</div>
				@endif
			</div>
		</div>
		<div class="col-md-6">
			<h3 class="text-center">Terbaik Untuk Anda</h3>
			<hr>
			@if($best_profiles->count() > 0 )
				<div class="row mt-4">
					@foreach($best_profiles as $profile)
					<div class="col-md-6">
						<div class="card hovercard mb-4">
							<div class="cardheader">
								<span class="badge badge-primary float-right">{{ strtoupper($profile->status) }}</span>
							</div>
							<div class="avatar">
								<img alt="" src="/img/profilepicture.jpeg">
								<a href="#" class="btn btn-outline-primary float-right" style="margin-right: 30px; margin-top: 60px;">Lihat</a>
							</div>
							<div class="card-body">
								<h5 class="card-title">{{ $profile->user->name }}</h5>
								<i class="flaticon-id-card"></i> {{ $profile->position }} - {{ $profile->grade }} <br>
								<i class="flaticon-map-location"></i> {{ $profile->district_from }}, {{ $profile->statefrom->name }} <br>
								<i class="flaticon-sign-1"></i> {{ $profile->district_to ? $profile->district_to.', ' : '' }} {{ $profile->stateto->name }}
								{{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
							</div>
						</div>
					</div>
					@endforeach
				</div>
			@else
				<div class="card start mb-4">
					<div class="card-body text-center">
						Anda perlu membina profil pertukaran terlebih dahulu. Sila klik butang mula dibawah untuk bermula. <br>
						<a href="{{ route('profile.create') }}" class="btn btn-primary round">Mula</a>
					</div>
				</div>
			@endif
			<h3 class="text-center">Ke Negeri Yang Sama</h3>
			<hr>
			@if($profiles->count() > 0 )
				<div class="row">
					@foreach($profiles as $profile)
					<div class="col-md-6">
						<div class="card hovercard mb-4">
							<div class="cardheader">
								<span class="badge badge-primary float-right">{{ strtoupper($profile->status) }}</span>
							</div>
							<div class="avatar">
								<img alt="" src="/img/profilepicture.jpeg">
								<a href="#" class="btn btn-outline-primary float-right" style="margin-right: 30px; margin-top: 60px;">Lihat</a>
							</div>
							<div class="card-body">
								<h5 class="card-title">{{ $profile->user->name }}</h5>
								<i class="flaticon-id-card"></i> {{ $profile->position }} - {{ $profile->grade }} <br>
								<i class="flaticon-map-location"></i> {{ $profile->district_from }}, {{ $profile->statefrom->name }} <br>
								<i class="flaticon-sign-1"></i> {{ $profile->district_to ? $profile->district_to.', ' : '' }} {{ $profile->stateto->name }}
								{{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
							</div>
						</div>
					</div>
					@endforeach
				</div>
			@else
				<div class="card start mb-4">
					<div class="card-body text-center">
						Anda perlu membina profil pertukaran terlebih dahulu. Sila klik butang mula dibawah untuk bermula. <br>
						<a href="{{ route('profile.create') }}" class="btn btn-primary round">Mula</a>
					</div>
				</div>
			@endif
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
