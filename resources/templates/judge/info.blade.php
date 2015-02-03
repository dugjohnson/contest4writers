<p>Judging this year: {{$judge->judgeThisYear}}</p>
<p>Published: {{$judge->judgePub}}</p>
<p>Maximum number of published: {{$judge->maxpubentries}}</p>
<p>Unpublished: {{$judge->judgeUnpub}}</p>
<p>Maximum number of unpublished: {{$judge->maxunpubentries}}</p>
<p>Either (not both) I’ve indicated the max. number above): {{$judge->judgeEitherNotBoth}}</p>

<fieldset>
    <legend>Categories</legend>
    <p>Mainstream: {{$judge->mainstream}}</p>

    <p>Category : {{$judge->category}}</p>

    <p>Historical : {{$judge->historical}}</p>

    <p>Single Title : {{$judge->singleTitle}}</p>

    <p>Paranormal : {{$judge->paranormal}}</p>

    <p>Inspirational : {{$judge->inspirational}}</p></fieldset>
<fieldset> 
    <legend>I’d be happy to judge a story with these elements</legend>
    <p>Erotic or high heat: {{$judge->erotic}}</p>

    <p>GLBT: {{$judge->glbt}}</p>

    <p>BSDM: {{$judge->bsdm}}</p>

    <p>Vampires and/or Werewolves: {{$judge->vampires}}</p>

    <p>Religious and/or inspirational content: {{$judge->vampires}}</p>
</fieldset>

<p>Special Instructions/Comments or Notes: (If you’ll be in a different location before published books are shipped,
    please note that here.): {{$judge->comments}}</p>

