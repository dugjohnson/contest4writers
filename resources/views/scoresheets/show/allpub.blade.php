@extends('scoresheets.layout')

@section('content')
    <div>
        <a href="/scoresheets" class="button small radius">Return to Scoresheets</a>
    </div>
    <div id="view-content">
        On a scale of 1 to 5, with 1 being the worst score and 5 being the best, how did the author fulfill the
        following criteria?
        @include('scoresheets.show.content.allpub')
    </div>
@stop
