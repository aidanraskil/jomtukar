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
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="kolum left">
                    <strong>Mesej</strong>
                    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
                </div>
                <div class="kolum right">
                    <form action="{{ route('messages.store') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="recipients[]" value="{{ $user->id }}">
                        Kepada : <strong>{!!$user->name!!}</strong>
                        <div class="form-group mt-3">
                            <textarea name="message" class="form-control" style="resize: none;" placeholder="Taipkan mesej anda">{{ old('message') }}</textarea>
                        </div>
                        <!-- Submit Form Input -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Hantar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
