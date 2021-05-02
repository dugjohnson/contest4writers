@extends('layout-forms')

@section('content')
    <div class="readonly">
        @include('entry.infounpub')
        @include('entry.infoelements')

        <a href="/uploads/entries/{{ $entry->filename }}?ver={{$vers}}" class="small button">Click to
            download {{ $entry->filename }}</a><br/>

        @if($entry->final_filename)
            <a href="/uploads/entries/{{ $entry->final_filename }}?ver={{$vers}}" class="small button">Click to
                download final {{ $entry->final_filename }}</a><br/>        @endif
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
