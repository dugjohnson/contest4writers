@extends('scoresheets.layout')

@section('content')
    <div>
        <a href="/scoresheets" class="button small radius">Return to Scoresheets</a>
    </div>
    <div id="view-content">
        @include('scoresheets.show.allscoresheets')
        <fieldset>
            <legend>ENDING</legend>
            <p>{{ $label['score18'] }} {{ $scoresheet->sheet->scores->score18 }} </p>
            <p>{{ $label['score19'] }} {{ $scoresheet->sheet->scores->score19 }} </p>
            <p>{{ $label['score20'] }} {{ $scoresheet->sheet->scores->score20 }} </p>
            <p>Comments: {{ $scoresheet->sheet->comments->comment20 }}</p>
        </fieldset>

        @include('scoresheets.show.bonus')
    </div>
@stop
