@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card start mb-4">
		<div class="card-body text-center">
			Anda perlu membina profil pertukaran terlebih dahulu. Sila klik butang mula dibawah untuk bermula. <br>
			<a href="" class="btn btn-primary round">Mula</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card hovercard">
				<div class="cardheader"></div>
				<div class="avatar">
					<img alt="" src="https://spark.laravel.com/storage/profiles/IER8ef8QpwKd46uFlnP6tEc6mcLp92i5WA2ad40M.jpeg">
				</div>
				<div class="card-body">
					<h5 class="card-title">Mohd Iskandar Bin Mohd Ali</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
				<ul class="list-group list-group-flush pull-left">
					<li class="list-group-item">
						<i class="flaticon-id-card"></i> Pen. Pegawai Teknologi Maklumat</i>
					</li>
					<li class="list-group-item">
						<i class="flaticon-map-location"></i> Kajang, Selangor
					</li>
					<li class="list-group-item">
						<i class="flaticon-sign-1"></i> Putrajaya
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
