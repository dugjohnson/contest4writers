@extends('layout-forms')

@section('content')
    <div class="readonly">
        @include('entry.formpub')
        <a href="/entries" class="button radius">Back to Entries</a>
    </div>
@stop