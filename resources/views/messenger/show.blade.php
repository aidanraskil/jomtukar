@extends('layouts.app')

@section('css')
<style>
    .kolum {
        background: white;
        border: solid 1px #ededed;
        padding: 1.25rem;
        float: left;
    }
    .left {
      width: 40%;
    }

    .right {
    	border-left: none;
      width: 60%;
    }
</style>
@endsection

@section('content')
<?php
	setlocale(LC_TIME, 'My');
	Carbon\Carbon::setLocale('ms');
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="row">
			<div class="kolum left"> 
				<span class="lead"><strong>Mesej</strong></span>
                    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')   
			</div>
			<div class="kolum right">
					<?php
						$dia = App\User::where('name', $thread->participantsString(Auth::id()))->first();
					?>
					<span class="lead">
						<strong>{{ $thread->participantsString(Auth::id()) }}</strong></span> <br>
						<small>{{ $dia->profiles->first()->position }} {{ $dia->profiles->first()->office ? 'di '.$dia->profiles->first()->office : '' }}</small>
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
</div>
@stop