@extends('layout-nonav')
@section('content')
    <h4>Closing out the contest</h4>
    <div class="full-width">
        <hr>
        <div><a href="/closeout/unpubnonfinal" class="button radius">Send email to unpublished non-finalist</a></div>
        <div><a href="/closeout/pubnonfinal" class="button radius">Send email to published non-finalist</a></div>
        <hr>
        <div class="full-width"><a href="/closeout/unpubfinal" class="button radius">Send email to unpublished finalist</a></div>
        <div><a href="/closeout/pubfinal" class="button radius">Send email to published finalist</a></div>
    </div>
    <p><a href="/administrators" class="button small radius">Return to Administrator page</a></p>

@stop
