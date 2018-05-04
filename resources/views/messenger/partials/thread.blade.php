<?php
	// $class = $thread->isUnread(Auth::id()) ? 'bg-info' : '';
	setlocale(LC_TIME, 'My');
	Carbon\Carbon::setLocale('ms');
	$dia = App\User::where('name', $thread->participantsString(Auth::id()))->first();
?>
	<li class="media py-4" style="border-bottom: solid 1px #ededed;">
		<img class="mavatar align-self-center mr-3" style="border: 1px solid #dfdfdf;" src="{{ $dia->thumbvatar }}" alt="Generic placeholder image">
		<div class="media-body">
			{{ Form::open(['method' => 'DELETE', 'route' => ['messages.destroy', $thread->id]]) }}
			{{ Form::submit('X', ['class' => 'btn btn-danger btn-sm float-right']) }}
		{{ Form::close() }}
			<strong>
				<a href="{{ route('messages.show', $thread->id) }}">
					 {{ $thread->participantsString(Auth::id()) }} @if($thread->userUnreadMessagesCount(Auth::id()) > 0)<span class="badge badge-pill badge-danger">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</span>@endif
	    		</a>
	    	</strong><br>
	    	<small>{{ $thread->created_at->diffForHumans() }}</small>
	    </div>
	</li>
