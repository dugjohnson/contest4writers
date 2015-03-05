@extends('layout-nonav')

@section('content')
    <table>
        <thead>
        <tr>
            <td>Entry</td>
            <td>Title</td>
            <td>Category</td>
            <td>Published</td>
            <td>Download Entry</td>
            <td>Upload Comments</td>
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
                <td>
                    @if ($scoresheet->published)
                        ---
                    @else
                        <a href="/uploads/entries/{{ $scoresheet->entry->filename }}">Download</a>
                    @endif
                </td>
                <td>
                    Upload
                </td>
                <td>
                    <a href="/scoresheets/{{$scoresheet->id}}">Show</a> /
                    <a href="/scoresheets/{{$scoresheet->id}}/edit">Edit</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
