@extends('layout-forms')

@section('content')
    <form method="POST" action="{{ url('/entries/' . $entry->id . '/upload') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="isCoordinator" value="{{ $isCoordinator }}">
    @include('errors')
    @if($entry->published)
        @include('entry.fileuploadpub')
    @else
        @include('entry.fileuploadunpub')
    @endif
    @include('entry.formclose')
    <hr>
    <strong>Uploading and replacing the file for the following entry</strong>
    @include('entry.infounpub')
@stop

