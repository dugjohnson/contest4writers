@extends('layout')

@section('content')
    <a href="/coordinators/scoresheets" class="tiny button radius">Return to Coordinator Scoresheet access</a>

    <table>
        <thead>
        <tr>
            <td colspan="7">Assignments for {{$judge->judgeName()}}</td>
        </tr>
        <tr>
            <td>Entry</td>
            <td>Title</td>
            <td>Category</td>
            <td>Published</td>
            <td>Status</td>
            <td>Score</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($scoresheets as $scoresheet)
            <tr>
                <td>{{$scoresheet->entry_id}}</td>
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

                <td>
                    <a href="/scoresheets/{{$scoresheet->id}}">Show</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
