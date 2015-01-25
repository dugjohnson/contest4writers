<p>{{$test}}</p>
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
        <td><a href="/entries/{{ $entry->id }}">Show</a> / <a href="/entries/{{ $entry->id }}/edit">Edit</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>