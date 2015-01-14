@extends('layout')

@section('content')

    <ul class="button-group">
        <li><a href="/entries/create/pub" class="button">Create Published Entry</a></li>
        <li><a href="/entries/create/unpub" class="button">Create Unpublished Entry</a></li>
    </ul>
    
    <div class="panel"><p>You will be asked to log in when you choose to make an entry. If you haven't registered yet, you should do that first.</p></div>

@stop
