@extends('layouts.app')

@section('content')
<?php
	setlocale(LC_TIME, 'My');
	Carbon\Carbon::setLocale('ms');
?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3>#{{ $thread->subject }}</h3>
					Dicipta {{ $thread->creator()->name }} pada {{ $thread->created_at->diffForHumans() }}
					<hr>
					<ul class="list-unstyled mt-4">
		        		@each('messenger.partials.messages', $thread->messages, 'message')
		        	</ul>
			        @include('messenger.partials.form-message')
				</div>
			</div>	       
	    </div>
	</div>
</div>
@stop