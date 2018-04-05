@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
		        <div class="col-md-12">
		            <form class="row" action="{{ route('profile.index') }}">
		                <div class="col-md-5 col-sm pr-sm-0">
		                    <input type="text" name="jawatan" id="search" value="" placeholder="Jawatan" class="form-control">
		                </div>
		                <div class="col-md-3 col-sm pr-sm-0">
		                    <select name="state_from" id="state_from" class="form-control{{ $errors->has('state_from') ? ' is-invalid' : '' }}">
                                	<option value=""  disabled selected>Dari negeri</option>
                                	@foreach($states as $state)
											<option value="{{ $state->id}}">{{ $state->name}}</option>
										@endforeach
                            </select>
		                </div>
		                <div class="col-md-3 col-sm pr-sm-0">
		                    <select name="state_to" id="state_to" class="form-control{{ $errors->has('state_to') ? ' is-invalid' : '' }}">
                                	<option value=""  disabled selected>Ke negeri</option>
                                	@foreach($states as $state)
											<option value="{{ $state->id}}">{{ $state->name}}</option>
										@endforeach
                            </select>
		                </div>
		                <div class="col-md-1 col-sm-auto pl-sm-2">
		                		<button class="btn btn-primary btn-block">Cari</button>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<h5>Profil pertukaran terkini</h5>
			<div class="card-columns mt-4">
				@foreach($profiles as $profile)
					<a href="#" class="card mb-3">
						<div class="card-body">
							<img src="/img/profilepicture.jpeg" class="mb-1" height="30" width="30" alt=""><br>
								<p>
									<strong>{{ $profile->user->name }}</strong><br>
									{{ $profile->office }} <br>
									{{ $profile->position }} gred {{ $profile->grade }}<br>
									<i class="flaticon-placeholder" data-toggle="tooltip" data-placement="top" title="Dari"></i> {{ $profile->district_from }} &#8226; {{ $profile->statefrom->name }} <br>
									<i class="flaticon-placeholders" data-toggle="tooltip" data-placement="top" title="Ke"></i> {{ $profile->district_to }} &#8226; {{ $profile->stateto->name }}
								</p>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
