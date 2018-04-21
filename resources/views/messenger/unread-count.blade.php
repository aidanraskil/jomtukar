<?php $count = Auth::user()->newThreadsCount(); ?>
@if($count > 0)
    <span class="badge badge-pill badge-danger">{{ $count }}</span>
@endif