Judging this year

I will judge:
<!-- JudgePub Form Input -->
<div class="form-group">
    {!! Form::label('judgePub', 'Published:') !!}
    {!! Form::select('judgePub', ['1'=>'Yes','0'=>'No'] ,$judge->judgePub , ['class' => 'form-control']) !!}
</div>
<!-- Maxpubentries Form Input -->
<div class="form-group">
    {!! Form::label('maxpubentries', 'Maximum number of published:') !!}
    {!! Form::text('maxpubentries',$judge->maxpubentries, ['class' => 'form-control','size'=>2,'maxlength'=>2]) !!}
</div>
<!-- JudgePub Form Input -->
<div class="form-group">
    {!! Form::label('judgeUnpub', 'Unpublished:') !!}
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
<p>Unpublished entries will be accessed through a link sent after March 15th.</p>
<p>Published books will be mailed, US and Canadian addresses only.</p>
 
<p> Due to the Daphne's growing popularity we often find some categories with more entries than expected and truly
    appreciate judges who are willing to take entries from more than one category to even out the distribution.
    If you can help in this way, please leave all preferences as Love to judge with the number of entries you are able
    to judge.</p>
<p>If you have a definite preference for or against a category, please select Top Choice or Will Not Judge from the
    list</p>

<h4>Category Preferences</h4>
<p>If you have a definite preference for or against a category, please select Top Choice or Will Not Judge from the
    list.</p>
<p>If you are entered in a published category, you can judge the unpublished division.
    If you are entered in an unpublished category, you can judge the published division.
    You will not be able to judge in the division and category you are entered.</p>

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
    {!! Form::label('bsdm', 'BSDM:') !!}
    {!! Form::radio('bsdm',true, $judge->bsdm==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('bsdm',false, $judge->bsdm==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('vampires', 'Vampires and/or Werewolves:') !!}
    {!! Form::radio('vampires',true, $judge->vampires==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('vampires',false, $judge->vampires==false, ['class' => 'form-control']) !!} No
</div>
<div class="form-group">
    {!! Form::label('religious', 'Religious and/or inspirational content:') !!}
    {!! Form::radio('religious',true, $judge->religious==true, ['class' => 'form-control']) !!} Yes {!! Form::radio('religious',false, $judge->religious==false, ['class' => 'form-control']) !!} No
</div>

<p>Special Instructions/Comments or Notes: (If you’ll be in a different location before published books are shipped,
    please note that here.)</p>
<!-- Comments Form Input -->
<div class="form-group">
{!! Form::label('comments', 'Comments or Notes:') !!}
{!! Form::textarea('comments',$judge->comments, ['class' => 'form-control']) !!}
</div>