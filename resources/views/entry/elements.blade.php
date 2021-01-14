<p>I’d be happy to judge a story with these elements</p>
<!-- Erotic Form Input -->
<div class="form-group">
    {!! Form::label('erotic', 'Sex/sensuality on the page:') !!}
    {!! Form::radio('erotic',true, $entry->erotic==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('erotic',false, $entry->erotic==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('glbt', 'LGBTQ+:') !!}
    {!! Form::radio('glbt',true, $entry->glbt==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('glbt',false, $entry->glbt==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('bdsm', 'Violence (including physical and sexual assault) on the page:') !!}
    {!! Form::radio('bdsm',true, $entry->bdsm==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('bdsm',false, $entry->bdsm==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('childdeath', 'Child death/near death on the page:') !!}
    {!! Form::radio('childdeath',true, $entry->childdeath==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('childdeath',false, $entry->childdeath==false, ['class' => 'form-control']) !!} No
</div>
