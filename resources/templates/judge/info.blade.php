<p>Judging this year: {{$judgeThisYear[$judge->judgeThisYear]}}</p>
<p>Published: {{$judge->judgePub?'Yes':'No'}}</p>
<p>Maximum number of published: {{$judge->maxpubentries}}</p>
<p>Unpublished: {{$judge->judgeUnpub?'Yes':'No'}}</p>
<p>Maximum number of unpublished: {{$judge->maxunpubentries}}</p>
<p>Either (not both) I’ve indicated the max. number above): {{$judge->judgeEitherNotBoth?'Yes':'No'}}</p>

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

    <p>BSDM: {{$judge->bsdm?'Yes':'No'}}</p>

    <p>Vampires and/or Werewolves: {{$judge->vampires?'Yes':'No'}}</p>

    <p>Religious and/or inspirational content: {{$judge->vampires?'Yes':'No'}}</p>
</fieldset>

<p>Special Instructions/Comments or Notes: (If you’ll be in a different location before published books are shipped,
    please note that here.): {{$judge->comments}}</p>

