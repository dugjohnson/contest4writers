<h5>Judge name: {{$judge->judgeName()}}</h5>
<p>Judging this year: {{$judgeThisYear[$judge->judgeThisYear]}}</p>
<p>Published Division: {{$judge->judgePub?'Yes':'No'}}</p>
<p>Maximum number of published: {{$judge->maxpubentries}}</p>
<p>Unpublished Division: {{$judge->judgeUnpub?'Yes':'No'}}</p>
<p>Maximum number of unpublished: {{$judge->maxunpubentries}}</p>
<p>Either (not both): {{$judge->judgeEitherNotBoth?'Yes':'No'}}</p>

<fieldset>
    <legend>Categories</legend>
    <p>Mainstream: {{$preferenceLevels[$judge->mainstream]}}</p>

    <p>Category : {{$preferenceLevels[$judge->category]}}</p>

    <p>Historical : {{$preferenceLevels[$judge->historical]}}</p>

    <p>Single Title : {{$preferenceLevels[$judge->singleTitle]}}</p>

    <p>Paranormal : {{$preferenceLevels[$judge->paranormal]}}</p>

    <p>Inspirational : {{$preferenceLevels[$judge->inspirational]}}</p></fieldset>
<fieldset> 
    <legend>I’d be happy to judge a story with these elements</legend>
    <p>Erotic or high heat: {{$judge->erotic?'Yes':'No'}}</p>

    <p>GLBT: {{$judge->glbt?'Yes':'No'}}</p>

    <p>BDSM: {{$judge->bdsm?'Yes':'No'}}</p>

    <p>Vampires and/or Werewolves: {{$judge->vampires?'Yes':'No'}}</p>

    <p>Religious and/or inspirational content (in category other than Inspirational): {{$judge->religious?'Yes':'No'}}</p>
</fieldset>

<p>Special Instructions/Comments or Notes: {{$judge->comments}}</p>

