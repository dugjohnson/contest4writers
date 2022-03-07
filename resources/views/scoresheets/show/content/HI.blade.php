<fieldset>
    <legend>CATEGORY SPECIFIC QUESTIONS - HISTORICAL ROMANTIC SUSPENSE</legend>
    <p>{{ $label['score18'] }} {{ $scoresheet->sheet->scores->score18 }} </p>

    <p>{{ $label['score19'] }} {{ $scoresheet->sheet->scores->score19 }} </p>

    <p>{{ $label['score20'] }} {{ $scoresheet->sheet->scores->score20 }} </p>

    <p>Comments: {{ $scoresheet->sheet->comments->comment20 }}</p>

</fieldset>

@include('scoresheets.show.bonus')
