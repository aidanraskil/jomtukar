@extends('layouts.app')

@section('content')
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
						{{-- <div class="ka text-info"><h1>{{ $best_profiles->count() }}</h1></div> --}}
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
	</div>
@endsection