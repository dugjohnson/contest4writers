<p>Judge ID: {{$judge->id}}</p>
<h5>Judge name: {{$judge->judgeName()}}</h5>
<p>Judging this year: {{$judgeThisYear[$judge->judgeThisYear]}}</p>
<p>Maximum number of published: {{$judge->maxpubentries}}</p>
<p>Maximum number of unpublished: {{$judge->maxunpubentries}}</p>

<fieldset>
    <legend>Categories</legend>
    <p>Mainstream: {{$preferenceLevels[$judge->mainstream]}}</p>

    <p>Short : {{$preferenceLevels[$judge->category]}}</p>

    <p>Historical : {{$preferenceLevels[$judge->historical]}}</p>

    <p>Long : {{$preferenceLevels[$judge->singleTitle]}}</p>

    <p>Paranormal : {{$preferenceLevels[$judge->paranormal]}}</p>

    <p>Spiritual : {{$preferenceLevels[$judge->inspirational]}}</p>
    <p>I'm willing to be an emergency judge for Unpublished :  {{$judge->emergencyJudgeUnpub?'Yes':'No'}}</p>
    <p>I'm willing to be an emergency judge for Published :  {{$judge->emergencyJudgePub?'Yes':'No'}}</p>

</fieldset>

<fieldset> 
    <legend>I’d be happy to judge a story with these elements</legend>
    <p>Sex/sensuality on the page: {{$judge->erotic?'Yes':'No'}}</p>

    <p>LGBTQ+: {{$judge->glbt?'Yes':'No'}}</p>

    <p>Violence (including physical and sexual assault) on the page: {{$judge->bdsm?'Yes':'No'}}</p>

    <p>Child death/near death on the page: {{$judge->childdeath?'Yes':'No'}}</p>

</fieldset>

<p>Special Instructions/Comments or Notes: {{$judge->comments}}</p>

