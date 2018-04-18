<?php 
	$class = $thread->isUnread(Auth::id()) ? 'bg-info' : '';
	setlocale(LC_TIME, 'My');
	Carbon\Carbon::setLocale('ms');
?>
<li class="media p-2 {{ $class }}">
	<img class="mavatar align-self-center mr-3" style="border: 1px solid #dfdfdf;" src="{{ $thread->creator()->thumbvatar }}" alt="Generic placeholder image">
	<div class="media-body">
		<strong>
			<a href="{{ route('messages.show', $thread->id) }}">
				 {{ $thread->subject }} ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
    		</a>
    	</strong><br>
    	<small>
    	Dicipta <strong>{{ $thread->creator()->name }}</strong> pada {{ $thread->created_at->diffForHumans() }}</small>
    </div>
</li>