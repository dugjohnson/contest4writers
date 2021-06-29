<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<BODY>
<P><B>RWA&reg; Kiss of Death--Romantic Mystery/Suspense Chapter presents</B></P>

<P><B>The Daphne du Maurier Award FOR EXCELLENCE IN MYSTERY/SUSPENSE {{ $contest_year }}</B></P>
@include('admin.closeout.emails.'.$type)
<hr>
@if('unpubfinalscore' == $type)
    @foreach($entry->final_scoresheets as $finalsheet)
        <fieldset>
            <legend>General Information</legend>
            <p><em>Judge ID: </em>{{$finalsheet->final_judge_id }}<em> Entry ID:</em> {{ $finalsheet->entry_id }}</p>

            <p>{{$finalsheet->title }}</p>

            <p>{!! $categories[$finalsheet->category] !!} {!! ($finalsheet->published?'Published':'Unpublished')!!}</p>

            <p><strong>Score: {{  $finalsheet->finalScore }}</strong></p>
        </fieldset>

        @include('scoresheets.finalist.showfinal')
        <hr>
    @endforeach
@else

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

@endif

</BODY>
</HTML>
