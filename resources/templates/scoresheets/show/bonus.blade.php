
<fieldset>
    <legend>Optional Bonus Points</legend>
    <p>Check all that apply - Worth 1 additional point each</p>

    <p>{{ $label['bonus1'] }} {{ $scoresheet->sheet->scores->bonus1 }}</p>

    <p>{{ $label['bonus2'] }} {{ $scoresheet->sheet->scores->bonus2 }}</p>

    <p>{{ $label['bonus3'] }} {{ $scoresheet->sheet->scores->bonus3 }}</p>
</fieldset>

<fieldset>
    <legend>Final Thoughts</legend>
    <p>Tiebreaker statement that best describes this particular entry.</p>
<p> {{ $tieBreakerList[ $scoresheet->sheet->tiebreaker] }}</p>

    <p> {{ $scoresheet->sheet->comments->commentFinal }}</p>
</fieldset>

@if ($scoresheet->sheet->judgeName)

    <fieldset>
        <legend>Judge Name</legend>
        {{ $scoresheet->sheet->judgeName }}

    </fieldset>
@endif