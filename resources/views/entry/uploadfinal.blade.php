@extends('layout-forms')

@section('content')
    <form method="POST" action="{{ url('/entries/final/' . $entry->id . '/upload') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="isCoordinator" value="{{ $isCoordinator }}">
    @include('errors')
    @include('entry.fileuploadpub')
    @include('entry.formclose')
    <hr>
    <strong>Uploading and/or replacing the finalist file for the following entry</strong>
    @include('entry.infounpub')
@stop

