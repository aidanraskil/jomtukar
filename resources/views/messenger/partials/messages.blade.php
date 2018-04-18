<div class="media mb-4">
    <img class="mr-3 rounded" src="{{ $message->user->thumbvatar }}" width="47" alt="{{ $message->user->name }}">
    <div class="media-body">
        <div class="card">
            <div class="card-header">{{ $message->user->name }} mesej pada {{ $message->created_at->diffForHumans() }}</div>
            <div class="card-body">
                {{ $message->body }}
            </div>
        </div>    
    </div>
</div>