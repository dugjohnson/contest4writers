<h4>Score Sheet Summary for {{$judge->judgeName()}}</h4>
<p>* is the score from this judge</p>
<table>
    <thead>
    <tr>
        <td>Entry #</td>
        <td>Title</td>
        <td>Category</td>
        <td>Published x</td>
        <td colspan="4">Scores </td>
    </tr>
    </thead>
    <tbody>
    <?php $theEntry = ''; ?>
    @foreach($scoresheets as $scoresheet)
    @if(! ($theEntry == $scoresheet->entry_id))
    @if (! $theEntry=='')
    </tr>
    @endif
    <tr class="border-top">
        <td>{{$scoresheet->entry_id}}</td>
        <td>{{$scoresheet->title}}</td>
        <td>{!! $categories[$scoresheet->category] !!}</td>
        <td>{!! $scoresheet->published?'Published':'Unpublished' !!}</td>
        <?php $theEntry = $scoresheet->entry_id; ?>
        @endif
        <td>
            @if ($judge->id==$scoresheet->judge_id)
                <strong>{{$scoresheet->finalScore}} *</strong>
            @else
                {{$scoresheet->finalScore}}
            @endif

        </td>
        @endforeach
    </tr>
    </tbody>
</table>