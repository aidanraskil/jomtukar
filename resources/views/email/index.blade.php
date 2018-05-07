@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-white">Email</div>
				@if($emails->count() > 0)
					<div class="card-body">
						
					</div>
				@else
					<div class="card-body text-center text-muted">
						<h1><strong><i class="fa flaticon-multiply-1"></i></strong></h1>
						<p>Tiada email yang dihantar setakat ini</p>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection