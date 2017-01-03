{!! Form::hidden('user_id',$judge->user_id) !!}
<h5>Judge name: {{$judge->judgeName()}}</h5>
<div class="form-group">
    {!! Form::label('judgeThisYear', 'Judging this year:') !!}
    {!! Form::select('judgeThisYear', $judgeThisYear,$judge->judgeThisYear , ['class' => 'form-control']) !!}
</div>

<!-- JudgePub Form Input -->
<div class="form-group">
    {!! Form::label('judgePub', 'Published Division:') !!}
    {!! Form::select('judgePub', ['1'=>'Yes','0'=>'No'] ,$judge->judgePub , ['class' => 'form-control']) !!}
</div>
<!-- Maxpubentries Form Input -->
<div class="form-group">
    {!! Form::label('maxpubentries', 'Maximum number of published:') !!}
    {!! Form::text('maxpubentries',$judge->maxpubentries, ['class' => 'form-control','size'=>2,'maxlength'=>2]) !!}
</div>
<!-- JudgePub Form Input -->
<div class="form-group">
    {!! Form::label('judgeUnpub', 'Unpublished Division:') !!}
    {!! Form::select('judgeUnpub', ['1'=>'Yes','0'=>'No'] ,$judge->judgeUnpub , ['class' => 'form-control']) !!}
</div>
<!-- Maxunpubentries Form Input -->
<div class="form-group">
    {!! Form::label('maxunpubentries', 'Maximum number of unpublished:') !!}
    {!! Form::text('maxunpubentries',$judge->maxunpubentries, ['class' => 'form-control','size'=>2,'maxlength'=>2]) !!}
</div>
<!-- JudgePub Form Input -->
<div class="form-group">
    {!! Form::label('judgeEitherNotBoth', 'Either (not both) I’ve indicated the max. number above:') !!}
    {!! Form::select('judgeEitherNotBoth', ['1'=>'Yes','0'=>'No'] ,$judge->judgeEitherNotBoth , ['class' => 'form-control']) !!}
</div>
<p>Unpublished entries will be accessed through this site on your page and downloadable as a link. You will receive an email when your entries are available, after March 15th.</p>
<p>Published books will be mailed after March 15th,  to US and Canadian addresses only.</p>
 <p>Due to the Daphne's continued popularity we often find some categories with more entries than expected and truly appreciate judges who are willing to 
    take entries from more than one category to even out distribution. If you can help in this way, please leave all preferences as Love to judge.</p>
<h4>Category Preferences</h4>
<p>If you have a definite preference for or against a category, please select Top Choice or Will Not Judge from the list.</p>
<p>If you are entered in one of the categories as either published or unpublished, you may judge in the sister division. 
    For example you're entered in mainstream published, you can judge mainstream unpublished, and vise versa. </p>
<div class="form-group">
    {!! Form::label('mainstream', 'Mainstream:') !!}
    {!! Form::select('mainstream', $preferenceLevels ,$judge->mainstream , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', $preferenceLevels ,$judge->category , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('historical', 'Historical:') !!}
    {!! Form::select('historical', $preferenceLevels ,$judge->historical , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('singleTitle', 'Single Title:') !!}
    {!! Form::select('singleTitle', $preferenceLevels ,$judge->singleTitle , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('paranormal', 'Paranormal :') !!}
    {!! Form::select('paranormal', $preferenceLevels ,$judge->paranormal , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('inspirational', 'Inspirational:') !!}
    {!! Form::select('inspirational', $preferenceLevels ,$judge->inspirational , ['class' => 'form-control']) !!}
</div>

<p>I’d be happy to judge a story with these elements</p>
<!-- Erotic Form Input -->
<div class="form-group">
{!! Form::label('erotic', 'Erotic or high heat:') !!}
{!! Form::radio('erotic',true, $judge->erotic==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('erotic',false, $judge->erotic==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('glbt', 'GLBT:') !!}
    {!! Form::radio('glbt',true, $judge->glbt==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('glbt',false, $judge->glbt==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('bdsm', 'BDSM:') !!}
    {!! Form::radio('bdsm',true, $judge->bdsm==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('bdsm',false, $judge->bdsm==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('vampires', 'Vampires and/or Werewolves:') !!}
    {!! Form::radio('vampires',true, $judge->vampires==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('vampires',false, $judge->vampires==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('religious', 'Religious and/or inspirational content (in category other than Inspirational):') !!}
    {!! Form::radio('religious',true, $judge->religious==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('religious',false, $judge->religious==false, ['class' => 'form-control']) !!} No
</div>

<p>Special Instructions/Comments or Notes: (If you’ll be in a different location before published books are shipped,
    please note that here.)</p>
<!-- Comments Form Input -->
<div class="form-group">
{!! Form::label('comments', 'Comments or Notes:') !!}
{!! Form::textarea('comments',$judge->comments, ['class' => 'form-control']) !!}
</div>