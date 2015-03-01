@extends('scoresheets.layout')

@section('content')
    <div id="view-content">
        @include('scoresheets.show.openunpub')
        <fieldset>
            <legend>BEGINNING OF MANUSCRIPT</legend>
            <p>{{ $label['score01'] }} {{ $scoresheet->sheet->scores->score01 }} </p>
            <p>{{ $label['score02'] }} {{ $scoresheet->sheet->scores->score02 }} </p>
            <p>{{ $label['score03'] }} {{ $scoresheet->sheet->scores->score03 }} </p>

            <p>Comments {{ $scoresheet->sheet->comments->comment03 }}</p>

        </fieldset>

        <fieldset>
            <legend>PLOT/PACING</legend>

            <p>{{ $label['score04'] }} {{ $scoresheet->sheet->scores->score04 }} </p>
            <p>{{ $label['score05'] }} {{ $scoresheet->sheet->scores->score05 }} </p>
            <p>{{ $label['score06'] }} {{ $scoresheet->sheet->scores->score06 }} </p>
            <p>Comments {{ $scoresheet->sheet->comments->comment06 }}</p>
        </fieldset>

        <fieldset>
            <legend>INSPIRATIONAL SPECIFIC</legend>
            <p>{{ $label['score07'] }} {{ $scoresheet->sheet->scores->score07 }} </p>
            <p>{{ $label['score08'] }} {{ $scoresheet->sheet->scores->score08 }} </p>
            <p>{{ $label['score09'] }} {{ $scoresheet->sheet->scores->score09 }} </p>
            <p>Comments {{ $scoresheet->sheet->comments->comment09 }}</p>

        </fieldset>

        <fieldset>
            <legend>CHARACTERIZATION</legend>
            <p>{{ $label['score10'] }} {{ $scoresheet->sheet->scores->score10 }} </p>
            <p>{{ $label['score11'] }} {{ $scoresheet->sheet->scores->score11 }} </p>
            <p>{{ $label['score12'] }} {{ $scoresheet->sheet->scores->score12 }} </p>
            <p>{{ $label['score13'] }} {{ $scoresheet->sheet->scores->score13 }} </p>
            <p>Comments {{ $scoresheet->sheet->comments->comment12 }}</p>

        </fieldset>

        <fieldset>
            <legend>DIALOGUE/NARRATIVE</legend>
            <p>{{ $label['score14'] }} {{ $scoresheet->sheet->scores->score14 }} </p>
            <p>{{ $label['score15'] }} {{ $scoresheet->sheet->scores->score15 }} </p>
            <p>{{ $label['score16'] }} {{ $scoresheet->sheet->scores->score16 }} </p>
            <p>{{ $label['score17'] }} {{ $scoresheet->sheet->scores->score17 }} </p>
            <p>Comments {{ $scoresheet->sheet->comments->comment17 }}</p>

        </fieldset>

        <fieldset>
            <legend>SETTING</legend>
            <p>{{ $label['score18'] }} {{ $scoresheet->sheet->scores->score18 }} </p>
            <p>{{ $label['score19'] }} {{ $scoresheet->sheet->scores->score19 }} </p>
            <p>{{ $label['score20'] }} {{ $scoresheet->sheet->scores->score20 }} </p>
            <p>Comments {{ $scoresheet->sheet->comments->comment20 }}</p>

        </fieldset>
        <fieldset>
            <legend>POINT OF VIEW</legend>
            <p>{{ $label['score21'] }} {{ $scoresheet->sheet->scores->score21 }} </p>
            <p>Comments {{ $scoresheet->sheet->comments->comment21 }}</p>

        </fieldset>

        <fieldset>
            <legend>STYLE/VOICE</legend>
            <p>{{ $label['score22'] }} {{ $scoresheet->sheet->scores->score22 }} </p>
            <p>{{ $label['score23'] }} {{ $scoresheet->sheet->scores->score23 }} </p>
            <p>{{ $label['score24'] }} {{ $scoresheet->sheet->scores->score24 }} </p>
            <p>Comments {{ $scoresheet->sheet->comments->comment24 }}</p>

        </fieldset>
        @include('scoresheets.show.bonus')
    </div>
@stop