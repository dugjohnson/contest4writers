<table>
    <thead>
    <tr>
        <td>Judge #</td>
        <td>Name</td>
        <td>This Year</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    @foreach($judges as $judge)
        <tr>
            <td>{{ $judge->user_id }}</td>
            <td>{{ $judge->judgeName() }}</td>
            <td>{!! $judge->judgeThisYear?$judge->judgeThisYear:'<em><strong>Not updated</strong></em>' !!}</td>
            <td><a href="/coordinators/judges/{{ $judge->id }}">Show</a> / <a
                        href="/coordinators/judges/{{ $judge->id }}/edit">Edit</a></td>
        </tr>
    @endforeach
    </tbody>
</table>