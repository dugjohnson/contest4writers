@extends('scoresheets.layout')

@section('content')
    <div id="view-content">
        @include('scoresheets.show.openunpub')
        @include('scoresheets.show.content.PA')
    </div>
@stop