<div>
    <p>My story has these elements</p>
    <!-- Erotic Form Input -->
    <div class="form-group">
        {!! Form::label('erotic', 'Sex/sensuality on the page:') !!}
        {!! Form::radio('erotic',true, $entry->erotic==1, ['class' => 'form-control']) !!}
        Yes {!! Form::radio('erotic',false, $entry->erotic==0, ['class' => 'form-control']) !!} No
    </div>
    <div class="form-group">
        {!! Form::label('glbt', 'LGBTQ+:') !!}
        {!! Form::radio('glbt',true, $entry->glbt==1, ['class' => 'form-control']) !!}
        Yes {!! Form::radio('glbt',false, $entry->glbt==0, ['class' => 'form-control']) !!} No
    </div>
    <div class="form-group">
        {!! Form::label('bdsm', 'Violence (including physical and sexual assault) on the page:') !!}
        {!! Form::radio('bdsm',true, $entry->bdsm==1, ['class' => 'form-control']) !!}
        Yes {!! Form::radio('bdsm',false, $entry->bdsm==0, ['class' => 'form-control']) !!} No
    </div>
    <div class="form-group">
        {!! Form::label('childdeath', 'Child death/near death on the page:') !!}
        {!! Form::radio('childdeath',true, $entry->childdeath==1, ['class' => 'form-control']) !!}
        Yes {!! Form::radio('childdeath',false, $entry->childdeath==0, ['class' => 'form-control']) !!} No
    </div>
</div>
