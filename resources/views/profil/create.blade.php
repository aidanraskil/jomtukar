@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-3">
            @include('settings.partial.leftbar')
        </div>
		<div class="col-md-9">
			<div class="card pb-4">
				<div class="card-body">
					<h3>Cipta Profil Pertukaran</h3>
					<hr class="mb-4">
					<form method="POST" action="{{ route('profile.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Jawatan</label>
                                    <input id="position" type="text" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ old('position') }}" autofocus>
                                    @if ($errors->has('position'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="grade">Gred</label>
                                    <input id="grade" type="text" class="form-control{{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade" value="{{ old('grade') }}" autofocus>
                                    @if ($errors->has('grade'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('grade') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="office">Pejabat Semasa</label>
                                    <input id="office" type="text" class="form-control{{ $errors->has('office') ? ' is-invalid' : '' }}" name="office" value="{{ old('office') }}" autofocus>
                                    @if ($errors->has('office'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('office') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="office_from">Lokasi Pejabat Semasa</label>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <select name="state_from" id="state_from" class="form-control{{ $errors->has('state_from') ? ' is-invalid' : '' }}">
                                                <option value=""  disabled selected>Negeri</option>
                                                @foreach($states as $state)
                                                        <option value="{{ $state->id}}">{{ $state->name}}</strong></option>
                                                    @endforeach
                                            </select>
                                            @if ($errors->has('state_from'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('state_from') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <input id="district_from" type="text" class="form-control{{ $errors->has('district_from') ? ' is-invalid' : '' }}" name="district_from" value="{{ old('district_from') }}" placeholder="Daerah" autofocus>
                                            @if ($errors->has('district_from'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('district_from') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="state_to">Lokasi Pejabat Diingini</label>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <select name="state_to" id="state_to" class="form-control{{ $errors->has('state_to') ? ' is-invalid' : '' }}">
                                                <option value=""  disabled selected>Negeri</option>
                                                @foreach($states as $state)
                                                        <option value="{{ $state->id}}">{{ $state->name}}</strong></option>
                                                    @endforeach
                                            </select>
                                            @if ($errors->has('state_to'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('state_to') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <input id="district_to" type="text" class="form-control{{ $errors->has('district_to') ? ' is-invalid' : '' }}" name="district_to" value="{{ old('district_to') }}" placeholder="Daerah" autofocus>
                                            @if ($errors->has('district_from'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('district_to') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="job_scope">Skop Kerja</label>
                        	<textarea name="job_scope" class="form-control{{ $errors->has('job_scope') ? ' is-invalid' : '' }}" id="job_scope" cols="30" rows="5" style="resize: none;"></textarea>
                            @if ($errors->has('job_scope'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('job_scope') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="note">Nota</label>
                        	<textarea name="note" class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" id="note" cols="30" rows="3" style="resize: none;"></textarea>
                            @if ($errors->has('note'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('note') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
