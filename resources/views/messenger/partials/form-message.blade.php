<div class="media mb-4">
    <img class="mr-3 rounded" src="{{ Auth::user()->thumbvatar }}" width="47" alt="">
    <div class="media-body">
        <div class="card">
            <div class="card-header">
                Mesej Baru
            </div>
            <div class="card-body">
                <form action="{{ route('messages.update', $thread->id) }}" method="post">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
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
            </div>
        </div>
    </div>
</div>