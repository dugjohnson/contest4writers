@extends('layout-forms')

@section('content')
    <div class="readonly">
        <p>Entered By Publisher (not Author):  {{ ($entry->enteredByPublisher?'Yes':'No') }}</p>
        @include('entry.infopub')
        @if ($isCoordinator)
            @include('entry.infoadmin')
            <a href="/coordinators/entries" class="button radius">Back to Coordinator Entries</a>
        @else
            <a href="/entries" class="button radius">Back to Entries</a>
        @endif

    </div>
@stop