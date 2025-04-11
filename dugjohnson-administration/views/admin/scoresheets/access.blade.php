<div>
    <div class="large-12 columns">
        <strong>Total Scoresheets: {!! count($scoresheets) !!}</strong>
        <table>
            <thead>
            <tr>
                <td>Score #</td>
                <td>Title</td>
                <td>Category</td>
                <td>Published</td>
                <td>Status</td>
                <td>Score</td>
                <td>Tie Breaker</td>
                <td>Concerns</td>
                <td>Judge ID</td>
                <td>Judge name</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach( $scoresheets as $scoresheet)
                <tr>
                    <td><a href="/scoresheets/{{$scoresheet->id}}">{{$scoresheet->id}}</a></td>
                    <td>{{$scoresheet->title}}</td>
                    <td>{!! $categories[ $scoresheet->category ] !!}</td>
                    <td>{!! ($scoresheet->published?'Published':'Unpublished') !!}</td>
                    @if($scoresheet->finalScore == 0)
                        <td class="not-started">Not Started</td>
                    @else
                        @if ($scoresheet->completed)
                            <td class="completed">Completed</td>
                        @else
                            <td class="started">Started</td>
                        @endif
                    @endif
                    <td>{{$scoresheet->finalScore}}</td>
                    <td>{{$scoresheet->tiebreaker}}</td>
                    @if($scoresheet->scoresheetData->sheet->comments->comment01)
                        <td style="color:red;">Concern filed</td>
                    @else
                        <td>No concern comment</td>
                    @endif
{{--                    @if($scoresheet->published)--}}
{{--                        <td>---</td>--}}
{{--                    @elseif($scoresheet->commentsFile)--}}
{{--                        <td><a href="/uploads/comments/{{$scoresheet->commentsFile}}">Download</a></td>--}}
{{--                    @else--}}
{{--                        <td>No comments file</td>--}}
{{--                    @endif--}}

                    @if(isset($scoresheet->judge))
                        <td>{{$scoresheet->judge_id}}</td>
                        <td>{{$scoresheet->judge->judgeName()}}</td>
                        <td>
                            <a href="/coordinators/users/{{ $scoresheet->judge->user_id }}">Profile</a>/<a href="/coordinators/judges/{{ $scoresheet->judge_id }}">Preferences</a>
                            <a href="/scoresheets/{{ $scoresheet->judge_id }}/assigned">Assignments</a>
                            @if($isAdministrator && $scoresheet->completed)
                                <a href="/scoresheets/{{ $scoresheet->id }}/reopen">Reopen</a>
                            @endif
                        </td>
                    @else
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                    @endif
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>
