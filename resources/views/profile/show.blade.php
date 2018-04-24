@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="card hovercard">
				<div class="cardheader" style="height: 100px;">
				</div>
				<div class="avatar text-center" style="top: -70px; margin-bottom: -80px;">
					<img alt="" style="max-width: 150px; width: 150px; max-height: 150px; height: 160px;" src="{{ $user->avatar }}">
				</div>
				<div class="card-body text-center">
					<h4><strong>{{ $user->name }}</strong></h4>
				@if($user->profiles->count() > 0)

						{{ $user->profiles->first()->position }} gred {{ $user->profiles->first()->grade }} {!! $user->profiles->first()->office ? 'di '.$user->profiles->first()->office : '' !!} <br>
						{{ $user->profiles->first()->district_from }} &#8226; {{ $user->profiles->first()->statefrom->name }}
					<br>
					<i class="flaticon-repeat" data-toggle="tooltip" data-placement="top" title="Ingin bertukar ke"></i> <br>
						{!! $user->profiles->first()->district_to ? $user->profiles->first()->district_to.' &#8226;' : '' !!}  {{ $user->profiles->first()->stateto->name }} <br>
						@if($user->id != Auth::id())
						<div style="position: relative;">
							<a href="#" class="btn btn-primary mt-3">Mesej</a>
							<div class="btn-group mt-3">
								<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Lagi...
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						@endif
					</div>
					@if($user->profiles->first()->job_scope)
						<div class="card-body text-center" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
								<strong>Skop Kerja</strong><br>
								{{ $user->profiles->first()->job_scope }}
						</div>
					@endif
				@else
					<p>Profil pertukaran anda tidak dijumpai.</p>
				</div>
				@endif
			</div>
		</div>
		<div class="col-md-3">
			@include('partials.rightbar')
		</div>
	</div>
@endsection
