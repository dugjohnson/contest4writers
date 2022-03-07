<fieldset>
    <legend>TIE BREAKER STATEMENT</legend>
    <p>Please select the statement that best describes this particular entry, which will be added to the total score ONLY
        in the event of a tie.</p>

    <div class="form-group">
        {!! Form::label('tiebreaker', 'Tiebreaker:') !!}
        {!! Form::select('tiebreaker', $tieBreakerList ,$scoresheet->sheet->tiebreaker , ['class' => 'form-control','id'=>'tiebreaker']) !!}
    </div>
</fieldset>

<fieldset>
    <legend>OVERALL MANUSCRIPT COMMENTS</legend>

    <div class="form-group">
        @if (! $scoresheet->published)
            <p>Please use this area to provide additional thoughts or comments not included above or on the manuscript</p>
        @endif
        {!! Form::label('commentFinal', 'Comments:') !!}
        {!! Form::textarea('commentFinal',$scoresheet->sheet->comments->commentFinal, ['class' => 'form-control']) !!}
    </div>
</fieldset>

<fieldset>

    <div class="form-group">
        {!! Form::label('judgeName', 'Judge name (optional):') !!}
        {!! Form::text('judgeName',$scoresheet->sheet->judgeName, ['class' => 'form-control']) !!}
    </div>

</fieldset>
