
<fieldset>
    <legend>Bonus</legend>
    <p>worth 1 additional point each</p>
    <div class="form-group">
        {!! Form::label('bonus1',  $label['bonus1'].'&nbsp;&nbsp;',['class'=>'left']) !!}
        {!! Form::checkbox('bonus1','1',$scoresheet->sheet->scores->bonus1,['class'=>'scorer form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bonus2',  $label['bonus2'].'&nbsp;&nbsp;',['class'=>'left']) !!}
        {!! Form::checkbox('bonus2','1',$scoresheet->sheet->scores->bonus2,['class'=>'scorer form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bonus3',  $label['bonus3'].'&nbsp;&nbsp;',['class'=>'left']) !!}
        {!! Form::checkbox('bonus3','1',$scoresheet->sheet->scores->bonus3,['class'=>'scorer form-control']) !!}
    </div>
</fieldset>

<fieldset>
    <legend>Final Thoughts</legend>
    <p>Tiebreaker statement that best describes this particular entry.</p>
    <div class="form-group">
        {!! Form::label('tiebreaker', 'Historical:') !!}
        {!! Form::select('tiebreaker', $tieBreakerList ,$scoresheet->sheet->tiebreaker , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
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