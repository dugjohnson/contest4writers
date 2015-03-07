<fieldset>
    <legend>OPTIONAL BONUS POINTS</legend>
    <p>Check all that apply - Worth 1 additional point each</p>

    <div class="form-group">
        <label for="bonus1">{{ $label['bonus1'] }}
            {!! Form::checkbox('bonus1','1',$scoresheet->sheet->scores->bonus1,['class'=>'scorer form-control']) !!}
        </label>
    </div>
    <div class="form-group">
        <label for="bonus2">{{ $label['bonus2'] }}
            {!! Form::checkbox('bonus2','1',$scoresheet->sheet->scores->bonus2,['class'=>'scorer form-control']) !!}
        </label>
    </div>
    <div class="form-group">
        <label for="bonus3">{{ $label['bonus3'] }}
            {!! Form::checkbox('bonus3','1',$scoresheet->sheet->scores->bonus3,['class'=>'scorer form-control']) !!}
        </label>
    </div>
</fieldset>
<fieldset>
    <legend>TIE BREAKER STATEMENT</legend>
    <p>Please select the statement that best describes this particular entry, which will be added to the total score ONLY
        in the event of a tie.</p>

    <div class="form-group">
        {!! Form::label('tiebreaker', 'Tiebreaker:') !!}
        {!! Form::select('tiebreaker', $tieBreakerList ,$scoresheet->sheet->tiebreaker , ['class' => 'form-control']) !!}
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