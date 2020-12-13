    <fieldset>
        <legend>OPENING</legend>
        <p>{{ $label['score01'] }} {{ $scoresheet->sheet->scores->score01 }} </p>

        <p>{{ $label['score02'] }} {{ $scoresheet->sheet->scores->score02 }} </p>

        <p>Comments: {{ $scoresheet->sheet->comments->comment02 }} </p>
    </fieldset>

    <fieldset>
        <legend>PLOT/PACING</legend>
        <p>{{ $label['score03'] }} {{ $scoresheet->sheet->scores->score03 }} </p>

        <p>{{ $label['score04'] }} {{ $scoresheet->sheet->scores->score04 }} </p>

        <p>Comments: {{ $scoresheet->sheet->comments->comment04 }}</p>
    </fieldset>

    <fieldset>
        <legend>CHARACTERIZATION</legend>
        <p>{{ $label['score05'] }} {{ $scoresheet->sheet->scores->score05 }} </p>

        <p>{{ $label['score06'] }} {{ $scoresheet->sheet->scores->score06 }} </p>

        <p>Comments: {{ $scoresheet->sheet->comments->comment06 }}</p>
    </fieldset>

    <fieldset>
        <legend>VOICE/POINT OF VIEW</legend>
        <p>{{ $label['score07'] }} {{ $scoresheet->sheet->scores->score07 }} </p>

        <p>{{ $label['score08'] }} {{ $scoresheet->sheet->scores->score08 }} </p>

        <p>Comments: {{ $scoresheet->sheet->comments->comment08 }}</p>
    </fieldset>

    <fieldset>
        <legend>DIALOGUE/NARRATIVE</legend>
        <p>{{ $label['score09'] }} {{ $scoresheet->sheet->scores->score09 }} </p>

        <p>{{ $label['score10'] }} {{ $scoresheet->sheet->scores->score10 }} </p>

        <p>{{ $label['score11'] }} {{ $scoresheet->sheet->scores->score11 }} </p>

        <p>{{ $label['score12'] }} {{ $scoresheet->sheet->scores->score12 }} </p>

        <p>Comments: {{ $scoresheet->sheet->comments->comment12 }}</p>
    </fieldset>

    <fieldset>
        <legend>STORY DETAILS</legend>
        <p>{{ $label['score13'] }} {{ $scoresheet->sheet->scores->score13 }} </p>

        <p>{{ $label['score14'] }} {{ $scoresheet->sheet->scores->score14 }} </p>

        <p>{{ $label['score15'] }} {{ $scoresheet->sheet->scores->score15 }} </p>

        <p>{{ $label['score16'] }} {{ $scoresheet->sheet->scores->score16 }} </p>

        <p>{{ $label['score17'] }} {{ $scoresheet->sheet->scores->score17 }} </p>

        <p>Comments: {{ $scoresheet->sheet->comments->comment17 }}</p>
    </fieldset>
    @include('scoresheets.show.bonus')
</div>
