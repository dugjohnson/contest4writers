@extends('layout-forms')

@section('content')
    <div class="readonly">
        <p>Entered By Publisher (not Author):  {{ ($entry->enteredByPublisher?'Yes':'No') }}</p>
        @include('entry.infopub')
        <a href="/entries" class="button radius">Back to Entries</a>
    </div>
@stop