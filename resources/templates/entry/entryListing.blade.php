<table>
    <thead>
    <tr>
        <td>Entry #</td>
        <td>Title</td>
        <td>Author</td>
        <td>Category</td>
        <td>Published</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    @foreach($entries as $entry)
        <tr>
            <td>{{ $entry->id }}</td>
            <td>{{ $entry->title }}</td>
            <td>{{ $entry->author }}</td>
            <td>{{ $entry->category }}</td>
            <td>{!! ($entry->published?'Yes':'No') !!}</td>
            <td><a href="{!! $isCoordinator ? '/coordinators': '' !!}/entries/{{ $entry->id }}">Show</a> /
                @if($entry->received)
                    <strong>Locked @if($isCoordinator)
                            <a href="/coordinators/entries/{{ $entry->id }}/edit">Edit</a>
                    @endif</strong>
                @else
                    <a href="{!! $isCoordinator ? '/coordinators': '' !!}/entries/{{ $entry->id }}/edit">Edit</a>
                    @if (! $entry->published)
                        <br>
                        <a href="{!! $isCoordinator ? '/coordinators': '' !!}/entries/{{ $entry->id }}/upload">Upload/Replace Entry</a>
                    @endif
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>