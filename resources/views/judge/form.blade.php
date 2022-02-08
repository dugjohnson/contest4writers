{!! Form::hidden('user_id',$judge->user_id) !!}
<h5>Judge name: {{$judge->judgeName()}}</h5>
<!-- <div class="form-group">
    {!! Form::label('judgeThisYear', 'Judging this year:') !!}
    {!! Form::select('judgeThisYear', $judgeThisYear,$judge->judgeThisYear , ['class' => 'form-control']) !!}
</div>
-->
@if(empty($judge->judgeThisYear))
<div class="form-group" style="background-color: lightgray; border: solid red 2px; padding: 10px;">
    @else
        <div class="form-group">
@endif
        <div class="form-group">
        <h2>{!! Form::label('judgeThisYear', 'Judging this year:') !!}</h2>
        {!! Form::radio('judgeThisYear','LJ', $judge->judgeThisYear=='LJ', ['class' => 'form-control']) !!} I would love to judge this year<br/>
        {!! Form::radio('judgeThisYear','NY', $judge->judgeThisYear=='NY', ['class' => 'form-control']) !!} Ask me next year<br/>
        {!! Form::radio('judgeThisYear','EJ', $judge->judgeThisYear=='EJ', ['class' => 'form-control']) !!} Only use me in an emergency<br/>
        {!! Form::radio('judgeThisYear','RM', $judge->judgeThisYear=='RM', ['class' => 'form-control']) !!} Please remove me from judging list<br/>
    </div>
    <div></div>
        </div>
        @if(empty($judge->judgeThisYear))
            <div class="form-group" style="background-color: lightgray; border: solid red 2px; padding: 10px;">
                @else
                    <div class="form-group">
                        @endif
            <p>Sometimes, at the end of judging, the committee needs emergency judges to quickly read and judge an entry. This can happen if an assigned
            judge can't complete their assignment, or if there is a very close score that needs a tie breaker. If you are willing to fill that task if
            it became necessary, the committee would appreciate it</p>
            {!! Form::label('emergencyJudge', 'I am willing to be an emergency judge:') !!}
            {!! Form::radio('emergencyJudge','T', $judge->emergencyJudge==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('emergencyJudge','F', $judge->emergencyJudge==false, ['class' => 'form-control']) !!} No
        </div>
<!-- Maxpubentries Form Input -->
<div class="form-group">
    {!! Form::label('maxpubentries', 'Maximum number of published entries I will judge:') !!}
    {!! Form::text('maxpubentries',$judge->maxpubentries, ['class' => 'form-control','size'=>2,'maxlength'=>2]) !!}
</div>
<!-- Maxunpubentries Form Input -->
<div class="form-group">
    {!! Form::label('maxunpubentries', 'Maximum number of unpublished entries I will judge:') !!}
    {!! Form::text('maxunpubentries',$judge->maxunpubentries, ['class' => 'form-control','size'=>2,'maxlength'=>2]) !!}
</div>
<p>All entries will be accessed through this site on your page as a downloadable file (Unpublished entries will be RTF, Published entries will be PDF). You will receive an email when your entries are available around March 26th. </p>
 <p>Due to the Daphne's continued popularity we often find some categories with more entries than expected and truly appreciate judges who are willing to
    take entries from more than one category to even out distribution. If you can help in this way, please leave all preferences as Love to judge.</p>
<h4>Category Preferences</h4>
<p>Please select a preference level for each entry category.</p>
<p>If you are entered in one of the categories as either published or unpublished, you may judge in the sister division.
    For example you're entered in mainstream published, you can judge mainstream unpublished, and vise versa. </p>
<div class="form-group">
    {!! Form::label('mainstream', 'Mainstream:') !!}
    {!! Form::select('mainstream', $preferenceLevels ,$judge->mainstream , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category', 'Short (40k-65k words):') !!}
    {!! Form::select('category', $preferenceLevels ,$judge->category , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('historical', 'Historical:') !!}
    {!! Form::select('historical', $preferenceLevels ,$judge->historical , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('singleTitle', 'Long (65k+ words):') !!}
    {!! Form::select('singleTitle', $preferenceLevels ,$judge->singleTitle , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('paranormal', 'Paranormal :') !!}
    {!! Form::select('paranormal', $preferenceLevels ,$judge->paranormal , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('inspirational', 'Spiritual:') !!}
    {!! Form::select('inspirational', $preferenceLevels ,$judge->inspirational , ['class' => 'form-control']) !!}
</div>

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

<p>Special Instructions/Comments or Notes:</p>
<!-- Comments Form Input -->
<div class="form-group">
{!! Form::label('comments', 'Comments or Notes:') !!}
{!! Form::textarea('comments',$judge->comments, ['class' => 'form-control']) !!}
</div>
