<table>
    <thead>
    <tr>
        <td>Entry</td>
        <td>Title</td>
        <td>Category</td>
        <td>Published</td>
        <td>Judge</td>
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
            <td>{!! ($scoresheet->judgeID?$scoresheet->judgeID:'not assigned') !!}</td>
            <td>
                <a href="/scoresheets/{{$scoresheet->id}}">Show</a> /
                @if ($scoresheet->completed)
                    Locked
                @else
                    <a href="/scoresheets/{{$scoresheet->id}}/edit">Edit</a>
                @endif

            </td>
        </tr>
    @endforeach
    </tbody>
</table>