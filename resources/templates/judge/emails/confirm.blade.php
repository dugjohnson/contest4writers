<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<BODY>
<P><B>RWA&reg;Mystery/Suspense Chapter presents</B></P>

<P><B>The Daphne du Maurier Award</B></P>

<P><B>FOR EXCELLENCE IN MYSTERY/SUSPENSE PUBLISHED DIVISION 2015</B></P>
<p>Thank you for visiting the RWA Kiss of Death Daphne du Maurier Award for Excellence In Mystery and Suspense Database.
If you decided to judge, we'll be in touch as the contest entry period winds down the 15th of March.
</p>

<h3>Please mark your calendars for these deadlines.</h3>
<h5>Deadline for judging Unpublished entries is 15th of April.</h5>
<h5>Deadline for judging Published books is 15th of May.</h5>

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
    <p>Inspirational : {{$preferenceLevels[$judge->inspirational]}}</p>
</fieldset>
<h3>Please make sure your contact information in our system is up to date and complete by going to "Check your profile"</h3>

<p>If anything changes with these selections, you can revisit the preference list until March fifteenth.</p>

<p>Any other questions, feel free to contact Nancy J Nicholson, Judge Coordinator at ndjnich@gmail.com.</p>

<p>Thanks,</p>

<p>The Daphne Committee</p>
</BODY>
</HTML>