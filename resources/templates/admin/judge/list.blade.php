<table>
    <thead>
    <tr>
        <td>Judge #</td>
        <td>User #</td>
        <td>Name</td>
        <td>This Year</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    @foreach($judges as $judge)
        <tr>
            <td>{{ $judge->id }}</td>
            <td>{{ $judge->user_id }}</td>
            <td><a href="/coordinators/users/{{ $judge->user_id }}">{{ $judge->judgeName() }}</a></td>
            <td>{!! $judge->judgeThisYear?$judge->judgeThisYear:'<em><strong>Not updated</strong></em>' !!}</td>
            <td><a href="/coordinators/judges/{{ $judge->id }}">Show</a> / <a
                        href="/coordinators/judges/{{ $judge->id }}/edit">Edit</a></td>
        </tr>
    @endforeach
    </tbody>
</table>