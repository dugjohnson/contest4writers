@extends('scoresheets.layout')

@section('content')
    <div>
        <legend>SCORING (100 points max)</legend>
        <ul>
            <li>5 = excellent</li>
            <li>4 = good</li>
            <li>3 = average</li>
            <li>2 = fair</li>
            <li>1 = poor</li>
            <p>Any concerns to share with the contest committee? Please let us know if this book is entered in the wrong
                category, contains language or situations that are culturally or racially offensive, or is otherwise
                problematic.</p>
            <p>Comments (not required to a have a response): {{ $scoresheet->sheet->comments->comment01 }} </p>
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
