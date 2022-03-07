<fieldset>
    <legend>TIE BREAKER STATEMENT</legend>
    <p>Please mark ONE statement that best describes this particular entry. This question will only be used as a
        tie-breaker. </p>
    <p> {{ $tieBreakerList[ $scoresheet->sheet->tiebreaker] }}</p>

    <p> {{ $scoresheet->sheet->comments->commentFinal }}</p>
</fieldset>

@if ($scoresheet->sheet->judgeName)

    <fieldset>
        <legend>Judge Name</legend>
        {{ $scoresheet->sheet->judgeName }}

    </fieldset>
@endif
