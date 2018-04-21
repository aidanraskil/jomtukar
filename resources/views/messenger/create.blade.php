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
                    <h3>Mesej</h3>
                    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')   
                </div>       
                <div class="kolum right">
                    <form action="{{ route('messages.store') }}" method="post">
                        {{ csrf_field() }}
                        @if($users->count() > 0)
                            <div class="checkbox">
                                @foreach($users as $user)
                                    <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                                            value="{{ $user->id }}">{!!$user->name!!}</label>
                                @endforeach
                            </div>
                        @endif  
                        <!-- Subject Form Input -->
                       {{--  <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject"
                                   value="{{ old('subject') }}">
                        </div> --}}
                        <!-- Message Form Input -->
                        <div class="form-group">
                            <textarea name="message" class="form-control" style="resize: none;" placeholder="Taipkan mesej anda">{{ old('message') }}</textarea>
                        </div>                          
                        <!-- Submit Form Input -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>    
    </div>
</div>
@stop