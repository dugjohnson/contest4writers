<fieldset>
    <legend>General Information</legend>
    <p><em>Judge ID: </em>{{$scoresheet->judge_id }}<em> Entry ID:</em> {{ $scoresheet->entry_id }}</p>

    <p>{{$scoresheet->title }}</p>

    <p>{!! $categories[$scoresheet->category] !!} {!! ($scoresheet->published?'Published':'Unpublished')!!}</p>

    <p><strong><em>{!! $scoresheet->completed?'Final Score:':'Score so far:' !!}</em><span
                    id="showFinalScore"> {{  $scoresheet->finalScore }} </span></strong></p>
</fieldset>

@include('scoresheets.show.'.($scoresheet->published?'allpub':$scoresheet->category))
