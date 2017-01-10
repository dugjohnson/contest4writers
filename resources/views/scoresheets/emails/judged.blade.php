<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<BODY>
<P><B>RWA&reg;Mystery/Suspense Chapter presents</B></P>

<P><B>The Daphne du Maurier Award</B></P>

<P><B>FOR EXCELLENCE IN MYSTERY/SUSPENSE 2017</B></P>
<fieldset>
    <legend>General Information</legend>
    <p><em>Judge ID: </em>{{$scoresheet->judge_id }}<em> Entry ID:</em> {{ $scoresheet->entry_id }}</p>

    <p>{{$scoresheet->title }}</p>

    <p>{!! $categories[$scoresheet->category] !!} {!! ($scoresheet->published?'Published':'Unpublished')!!}</p>

    <p><strong><em>{!! $scoresheet->completed?'Final Score:':'Score so far:' !!}</em><span
                    id="showFinalScore"> {{  $scoresheet->finalScore }} </span></strong></p>
</fieldset>

@include('scoresheets.show.content.'.($scoresheet->published?'allpub':$scoresheet->category))

<P>If you see anything amiss, please contact the coordinator for this category or judge coordinator</P>  <!-- todo: need link to judge coordinator -->
</BODY>
</HTML>