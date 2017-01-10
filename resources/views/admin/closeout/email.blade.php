@extends('layout-nonav')
@section('content')
    <h4>You are about to send emails to {{$description}}</h4>
    <p><a href="/closeout/email/{{$type}}/go" class="button small radius">Send the emails (cannot be stopped)</a></p>
    <p><a href="/closeout" class="button large radius">Cancel and return to closeout page</a></p>

@stop
