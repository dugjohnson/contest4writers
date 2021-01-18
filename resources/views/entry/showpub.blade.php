@extends('layout-forms')

@section('content')
    <div class="readonly">
        <p>Entered By Publisher (not Author): {{ ($entry->enteredByPublisher?'Yes':'No') }}</p>
        @include('entry.infopub')
        @include('entry.infoelements')
        <a href="/uploads/entries/{{ $entry->filename }}?ver={{$vers}}" class="small button">Click to
            download {{ $entry->filename }}</a><br/>
        <p>Signature: {{$entry->signed}}</p>
        @if ($isCoordinator)
            @include('entry.infoadmin')
            <a href="/coordinators/entries" class="button radius">Back to Coordinator Entries</a>
        @else
            <a href="/entries" class="button radius">Back to Entries</a>
        @endif

    </div>
@stop

@section('sidebar')
    @if ($canDelete)
        @include('entry.deleteform')
    @endif
@stop
