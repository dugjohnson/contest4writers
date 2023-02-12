<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<BODY>
<P  ><B>RWA&reg;Mystery/Suspense Chapter presents</B></P>
<P  ><B>The Daphne du Maurier Award</B></P>
<P  ><B>FOR EXCELLENCE IN MYSTERY/SUSPENSE PUBLISHED DIVISION {{ $contest_year }}</B></P>

<P  >The following information has been submitted. However, your entry is not accepted until payment is received. See information below.</P>

@include('user.contact')

<P  >If any of this information is incorrect please visit <A  HREF="http://writingcontest.website/"><FONT COLOR="#0000ff"><U>http://writingcontest.website/</U></FONT></A></P>
<P  >Sign in and click Edit Profile</P>

@include('entry.infopub')
@include('entry.infoelements')
<a href="/uploads/entries/{{$entry->filename}}" >Click to download entry file {{$entry->filename}}</a>


<P  >Entries without completed entry form and payment will not be judged.</P>

@include('entry.financial')

<P>C. Tegethoff<br>
    Kiss of Death<br>
    P.O. Box 62735<br>
    Houston Texas 77205</P>

<P>Please include your invoice and entry numbers on your payment.</P>
</BODY>
</HTML>
