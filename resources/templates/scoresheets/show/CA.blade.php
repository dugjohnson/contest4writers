@extends('scoresheets.layout')


@section('content')
    <div id="view-content">
        <fieldset>
            <legend>Scoring (123 points max)</legend>
            <ul>
                <li>5 = excellent (publishable)</li>
                <li>4 = good (close to being publishable, but still needs minor work)</li>
                <li>3 = average (but not special)</li>
                <li>2 = (shows promise, but needs improvement)</li>
                <li>1 = poor (needs major work)</li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>BEGINNING OF MANUSCRIPT</legend>
            <p>{{ $label['score01'] }} {{ $scoresheet->sheet->scores->score01 }} </p>
            <p>{{ $label['score02'] }} {{ $scoresheet->sheet->scores->score02 }} </p>
            <p>{{ $label['score03'] }} {{ $scoresheet->sheet->scores->score03 }} </p>

            <p>Comment {{ $scoresheet->sheet->comments->comment03 }}</p>

        </fieldset>

        <fieldset>
            <legend>PLOT/PACING</legend>

            <p>{{ $label['score04'] }} {{ $scoresheet->sheet->scores->score04 }} </p>
            <p>{{ $label['score05'] }} {{ $scoresheet->sheet->scores->score05 }} </p>
            <p>{{ $label['score06'] }} {{ $scoresheet->sheet->scores->score06 }} </p>
            <p>Comment {{ $scoresheet->sheet->comments->comment06 }}</p>
        </fieldset>

        <fieldset>
            <legend>CHARACTERIZATION</legend>
            <p>{{ $label['score07'] }} {{ $scoresheet->sheet->scores->score07 }} </p>
            <p>{{ $label['score08'] }} {{ $scoresheet->sheet->scores->score08 }} </p>
            <p>{{ $label['score09'] }} {{ $scoresheet->sheet->scores->score09 }} </p>
            <p>{{ $label['score10'] }} {{ $scoresheet->sheet->scores->score10 }} </p>
            <p>{{ $label['score11'] }} {{ $scoresheet->sheet->scores->score11 }} </p>
            <p>Comment {{ $scoresheet->sheet->comments->comment11 }}</p>

        </fieldset>

        <fieldset>
            <legend>CATEGORY (SERIES) SPECIFIC </legend>
            <p>{{ $label['score12'] }} {{ $scoresheet->sheet->scores->score12 }} </p>
            <p>{{ $label['score13'] }} {{ $scoresheet->sheet->scores->score13 }} </p>
            <p>{{ $label['score14'] }} {{ $scoresheet->sheet->scores->score14 }} </p>
            <p>Comment {{ $scoresheet->sheet->comments->comment14 }}</p>

        </fieldset>

        <fieldset>
            <legend>DIALOGUE/NARRATIVE</legend>
            <p>{{ $label['score15'] }} {{ $scoresheet->sheet->scores->score15 }} </p>
            <p>{{ $label['score16'] }} {{ $scoresheet->sheet->scores->score16 }} </p>
            <p>{{ $label['score17'] }} {{ $scoresheet->sheet->scores->score17 }} </p>
            <p>{{ $label['score18'] }} {{ $scoresheet->sheet->scores->score18 }} </p>
            <p>Comment {{ $scoresheet->sheet->comments->comment18 }}</p>

       </fieldset>

        <fieldset>
            <legend>SETTING</legend>
            <p>{{ $label['score19'] }} {{ $scoresheet->sheet->scores->score19 }} </p>
            <p>{{ $label['score20'] }} {{ $scoresheet->sheet->scores->score20 }} </p>
            <p>Comment {{ $scoresheet->sheet->comments->comment20 }}</p>

        </fieldset>
        <fieldset>
            <legend>POINT OF VIEW</legend>
            <p>{{ $label['score21'] }} {{ $scoresheet->sheet->scores->score21 }} </p>
            <p>Comment {{ $scoresheet->sheet->comments->comment21 }}</p>

        </fieldset>

        <fieldset>
            <legend>STYLE/VOICE</legend>
            <p>{{ $label['score22'] }} {{ $scoresheet->sheet->scores->score22 }} </p>
            <p>{{ $label['score23'] }} {{ $scoresheet->sheet->scores->score23 }} </p>
            <p>{{ $label['score24'] }} {{ $scoresheet->sheet->scores->score24 }} </p>
            <p>Comment {{ $scoresheet->sheet->comments->comment24 }}</p>

        </fieldset>

        <fieldset>
            <legend>Bonus</legend>
            <p>worth 1 additional point each</p>

            <p>{{ $label['bonus1'] }} {{ $scoresheet->sheet->scores->bonus1 }}</p>

            <p>{{ $label['bonus2'] }} {{ $scoresheet->sheet->scores->bonus2 }}</p>

            <p>{{ $label['bonus3'] }} {{ $scoresheet->sheet->scores->bonus3 }}</p>
        </fieldset>

        <fieldset>
            <legend>Final Thoughts</legend>
            <p>Tiebreaker statement that best describes this particular entry.</p>

            <p>{{ $label['tiebreaker'] }} {{ $scoresheet->sheet->tiebreaker }}</p>

            <p> {{ $scoresheet->sheet->comments->commentFinal }}</p>
        </fieldset>

        @if ($scoresheet->sheet->judgeName)

            <fieldset>

                {{ $scoresheet->sheet->judgeName }}

            </fieldset>
        @endif
    </div>
@stop