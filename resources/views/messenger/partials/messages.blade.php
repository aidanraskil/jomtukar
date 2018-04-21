<div class="media mb-4">
	@if($message->user->name == Auth::user()->name)
    <div class="media-body">
        <div class="card" style="border: none;">
            <div class="card-body" style="background-color: #17a2b82e;">
                {!! nl2br($message->body) !!}
            </div>
        </div>    
        <small>{{ $message->created_at->diffForHumans() }}</small>
    </div>
    <img class="ml-3 rounded" src="{{ $message->user->thumbvatar }}" width="47" alt="{{ $message->user->name }}">
    @else
    <img class="mr-3 rounded" src="{{ $message->user->thumbvatar }}" width="47" alt="{{ $message->user->name }}">
    <div class="media-body">
        <div class="card" style="border: none;">
            <div class="card-body" style="background-color: #00000008;">
                {!! nl2br($message->body) !!}
            </div>
        </div>    
        <small>{{ $message->created_at->diffForHumans() }}</small>
    </div>
    @endif
</div>