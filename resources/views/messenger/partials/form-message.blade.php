
<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
    <div class="form-group">
        <textarea name="message" rows="3" class="form-control" style="resize: none;">{{ old('message') }}</textarea>
    </div>
 {{--    @if($users->count() > 0)
        <div class="checkbox">
            @foreach($users as $user)
                <label title="{{ $user->name }}">
                    <input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}
                </label>
            @endforeach
        </div>
    @endif --}}
    <div class="text-right">
        <button type="submit" class="btn btn-primary">Hantar</button>
    </div>
</form>