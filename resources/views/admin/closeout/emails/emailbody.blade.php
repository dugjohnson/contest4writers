<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<BODY>
<P><B>RWA&reg;Mystery/Suspense Chapter presents</B></P>

<P><B>The Daphne du Maurier Award</B></P>

<P><B>FOR EXCELLENCE IN MYSTERY/SUSPENSE 2017</B></P>
@include('admin.closeout.emails.'.$type)
<hr>
@foreach($entry->scoresheets as $scoresheet)
    <fieldset>
        <legend>General Information</legend>
        <p><em>Judge ID: </em>{{$scoresheet->judge_id }}<em> Entry ID:</em> {{ $scoresheet->entry_id }}</p>

        <p>{{$scoresheet->title }}</p>

        <p>{!! $categories[$scoresheet->category] !!} {!! ($scoresheet->published?'Published':'Unpublished')!!}</p>

        <p><strong>Score: {{  $scoresheet->finalScore }}</strong></p>
    </fieldset>

    @include('scoresheets.show.content.'.($scoresheet->published?'allpub':$scoresheet->category))
    @if(0==$scoresheet->published)
        <a href="http://writingcontest.website/uploads/comments/cmts-{{$scoresheet->id}}-{{$scoresheet->judge_id}}.rtf">Click
            to download comments file</a>
    @endif
    <hr>
@endforeach

</BODY>
</HTML>