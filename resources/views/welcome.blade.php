@extends('layouts.app')

@section('content')
<div class="jumbotron bg-info jumbotron-fluid" style="margin-top: -1.5rem; margin-bottom: 0rem;">
  <div class="container text-light">
    <h1 class="mb-4"><strong>Jom Tukar Suka Sama Suka</strong><br>
    Pertukaran suka sama suka antara pegawai awam jabatan kerajaan</h1>
    <form method="GET" action="{{ route('profile.index') }}">
	  <div class="form-row">
	    <div class="col">
	      <input type="text" class="form-control" name="position" placeholder="Jawatan">
	    </div>
	    <div class="col">
	      <input type="text" class="form-control" name="state_to" placeholder="Lokasi">
	    </div>
	    <button type="submit" class="btn btn-kuning mb-2">CARI</button>
	  </div>
	</form>
  </div>
</div>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-5" style="border: none; box-shadow: 0 1px 6px 0 rgba(0,0,0,0.06);">
				<div class="card-body ">
					<div class="text-center">
						<p style="margin-bottom: 0px;"><strong class="text-info">PROFIL PERTUKARAN TERKINI</strong></p>
					</div>
<<<<<<< HEAD
					@if($profiles->count() > 0)
					<div class="row">
						@foreach($profiles as $profile)
						<div class="col-md-6 ">
							<a href="{{ route('profile.show', $profile->user->id) }}" class="card p-2 mb-3" style="border: none; display: block;">
							<strong>{{ $profile->position }}</strong> di {{ $profile->district_from }} <br>
							<small class="text-muted">@if($profile->office)<i class="flaticon-home-2"></i> {{ $profile->office }}@endif <i class="flaticon-placeholder-3"></i> {{ $profile->statefrom->name }}</small>
							</a>
=======
					<div class="row mt-2">
					@foreach($profiles as $profile)
						<div class="col-md-6">
						<a href="{{ route('profile.show', $profile->user->id) }}" class="kotak">
						<strong>{{ $profile->position }}</strong> di {{ $profile->district_from }} <br>
						<small class="text-muted">@if($profile->office)<i class="flaticon-home-2"></i> {{ $profile->office }}@endif <i class="flaticon-placeholder-3"></i> {{ $profile->statefrom->name }}</small>
						</a>
>>>>>>> bd39429061b636b9cc50ce4059b17e524575a19e
						</div>
					@endforeach
					</div>
					@else
					<div class="text-center text-muted">
						<h3>Maaf, Tiada Profil Pertukaran Setakat Ini</h3>
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card mb-5" style="border: none; box-shadow: 0 1px 6px 0 rgba(0,0,0,0.06);">
				<div class="card-body">
					<p class="lead">
					Pertukaran dapat membantu memperkaya dan memperluaskan tugas (job enrichment and job enlargement) kepada pegawai dan boleh menyumbang kearah: </p>
					<ul>
						<li>Peningkatan produktiviti seseorang pegawai dan seterusnya organisasi tempat mereka berkhidmat</li>
						<li>Menambah serta mempelbagaikan pengalaman, pendedahan dan proses pembelajaran di kalangan pegawai terlibat yang mana proses ini amat berguna untuk kemajuan kerjaya mereka</li>
						<li>Membendung rasa bosan bertugas di satu tempat dan menjalankan tugas yang sama dalam tempoh masa yang panjang</li>
						<li>Memperluaskan lagi <i>networking</i> pegawai kerana ini dapat membantu mempermudahkan mereka melaksanakan tugas jawatan masing-masing</li>
						<li>Mencegah sebarang kemungkinan berlakunya penyelewengan, penyalahgunaan kuasa dan rasuah</li>
						<li>Memberi peluang kepada pegawai diselia oleh penyelia yang berbeza supaya penilaian prestasi mereka dapat dibuat dengan lebih saksama</li>
						<li>Membolehkan pegawai melihat organisasi di mana mereka ditempatkan dari perspektif yang berbeza dan dengan itu mereka diharap dapat mencuba pendekatan baru yang boleh mempertingkatkan lagi keberkesanan organisasi berkenaan</li>
						<li>Memberi peluang kepada pegawai mendapatkan tugas yang sesuai dengan minat, kebolehan, latihan dan pengalaman mereka supaya mereka dapat mencapai penghasilan kerja yang maksimum</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="background-color: yellow; margin-bottom: none; ">
	<div class="container py-5">
		<div class="row">
			<div class="col-6 col-md">
			  <strong><span style="color: #17a2b8;">LETS</span>TUKAR</strong>
			  <small class="d-block mb-3 text-muted">© {{ date('Y')}}</small>
			</div>
			<div class="col-6 col-md">
			  {{-- <h5>Features</h5>
			  <ul class="list-unstyled text-small">
			    <li><a class="text-muted" href="#">Cool stuff</a></li>
			    <li><a class="text-muted" href="#">Random feature</a></li>
			    <li><a class="text-muted" href="#">Team feature</a></li>
			    <li><a class="text-muted" href="#">Stuff for developers</a></li>
			    <li><a class="text-muted" href="#">Another one</a></li>
			    <li><a class="text-muted" href="#">Last time</a></li>
			  </ul> --}}
			</div>
			<div class="col-6 col-md">
			  {{-- <h5>Resources</h5>
			  <ul class="list-unstyled text-small">
			    <li><a class="text-muted" href="#">Resource</a></li>
			    <li><a class="text-muted" href="#">Resource name</a></li>
			    <li><a class="text-muted" href="#">Another resource</a></li>
			    <li><a class="text-muted" href="#">Final resource</a></li>
			  </ul> --}}
			</div>
			<div class="col-6 col-md">
			  {{-- <h5>Resources</h5>
			  <ul class="list-unstyled text-small">
			    <li><a class="text-muted" href="#">Business</a></li>
			    <li><a class="text-muted" href="#">Education</a></li>
			    <li><a class="text-muted" href="#">Government</a></li>
			    <li><a class="text-muted" href="#">Gaming</a></li>
			  </ul> --}}
			</div>
			<div class="col-6 float-right col-md">
			  {{-- <h5>About</h5>
			  <ul class="list-unstyled text-small">
			    <li><a class="text-muted" href="#">Team</a></li>
			    <li><a class="text-muted" href="#">Locations</a></li>
			    <li><a class="text-muted" href="#">Privacy</a></li>
			    <li><a class="text-muted" href="#">Terms</a></li>
			  </ul> --}}
			</div>
		</div>
	</div>
</div>
@endsection
