@extends('layout-forms')

@section('content')
    @include('entry.formunpub')
    <a href="/uploads/entries/{{ $entry->filename }}" class="small button">Click to download {{ $entry->filename }}</a><br/>
    <a href="/entries" class="button radius">Back to Entries</a>

@stop