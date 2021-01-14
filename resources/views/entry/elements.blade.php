<p>I’d be happy to judge a story with these elements</p>
<!-- Erotic Form Input -->
<div class="form-group">
    {!! Form::label('erotic', 'Sex/sensuality on the page:') !!}
    {!! Form::radio('erotic',true, $judge->erotic==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('erotic',false, $judge->erotic==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('glbt', 'LGBTQ+:') !!}
    {!! Form::radio('glbt',true, $judge->glbt==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('glbt',false, $judge->glbt==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('bdsm', 'Violence (including physical and sexual assault) on the page:') !!}
    {!! Form::radio('bdsm',true, $judge->bdsm==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('bdsm',false, $judge->bdsm==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('childdeath', 'Child death/near death on the page:') !!}
    {!! Form::radio('childdeath',true, $judge->childdeath==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('childdeath',false, $judge->childdeath==false, ['class' => 'form-control']) !!} No
</div>
