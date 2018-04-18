@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Featured
              </div>
                <ul class="list-group list-group-flush">
                    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')            
                </ul>
            </div>
		</div>
    </div>
</div>
@stop