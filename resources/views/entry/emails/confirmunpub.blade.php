<!DOCTYPE Html PUBLIC "-//W3C//DTD Html 4.0 Transitional//EN">
<Html>
<BODY>
<P><strong>RWA&reg; Mystery/Suspense Chapter presents</strong></P>

<P><strong>The Daphne du Maurier Award</strong></P>

<P><strong>FOR EXCELLENCE IN MYSTERY/SUSPENSE UNPUBLISHED DIVISION {{ $contest_year }}</strong></P>

<P>The following information has been submitted. However, your entry is not accepted until payment is received. See information below.</P>

@include('user.contact')

<P>If any of this information is incorrect please visit <A HREF="https://kodcontest.com/">https://kodcontest.com/</A></P>

@include('entry.infounpub')
@include('entry.infoelements')

<a href="{{ url('/uploads/entries/'.$entry->filename) }}" >Click to download entry file {{$entry->filename}}</a>

<P>Entries without completed entry form and payment will not be judged.</P>

@include('entry.financial')

<P>C. Tegethoff<br>
    Kiss of Death<br>
    P.O. Box 62735<br>
    Houston Texas 77205</P>

<P>Please include your entry numbers on your payment.</P>
</BODY>
</Html>
