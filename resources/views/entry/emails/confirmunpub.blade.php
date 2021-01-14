<!DOCTYPE Html PUBLIC "-//W3C//DTD Html 4.0 Transitional//EN">
<Html>
<BODY>
<P><B>RWA&reg; Mystery/Suspense Chapter presents</B></P>

<P><B>The Daphne du Maurier Award</B></P>

<P><B>FOR EXCELLENCE IN MYSTERY/SUSPENSE UNPUBLISHED DIVISION {{ $contest_year }}</B></P>

<P>The following information has been submitted. However, your entry is not accepted until payment is received. See information below.</P>

@include('user.contact')

<P>If any of this information is incorrect please visit <A HREF="http://writingcontest.website/">http://writingcontest.website</A></P>

@include('entry.infounpub')
{!! Html::link(URL::to('uploads/entries/'.$entry->filename),'Click to download entry file '.$entry->filename) !!}
<p></p>


<P>Entries without completed entry form and payment will not be judged.</P>

@include('entry.financial')

<P>Isla Grey, Treasurer<br>
c/o Jackie Renee<br>
PO Box 470403<br>
Los Angeles, CA 90303</P>

<P>Please include your entry numbers on your payment.</P>
</BODY>
</Html>
