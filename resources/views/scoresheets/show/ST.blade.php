@extends('scoresheets.layout')

@section('content')
    <div id="view-content">
        @include('scoresheets.show.openunpub')
        @include('scoresheets.show.content.ST')
    </div>
@stop