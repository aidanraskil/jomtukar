<?php 
	// $class = $thread->isUnread(Auth::id()) ? 'bg-info' : '';
	setlocale(LC_TIME, 'My');
	Carbon\Carbon::setLocale('ms');
	$dia = App\User::where('name', $thread->participantsString(Auth::id()))->first();
?>
<li class="media p-2">
	<img class="mavatar align-self-center mr-3" style="border: 1px solid #dfdfdf;" src="{{ $dia->thumbvatar }}" alt="Generic placeholder image">
	<div class="media-body">
		<strong>
			<a href="{{ route('messages.show', $thread->id) }}">
				 {{ $thread->participantsString(Auth::id()) }} @if($thread->userUnreadMessagesCount(Auth::id()) > 0)<span class="badge badge-pill badge-danger">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</span>@endif
    		</a>
    	</strong><br>
    	<small>{{ $thread->created_at->diffForHumans() }}</small>
    </div>
</li>