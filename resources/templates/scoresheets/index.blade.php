@extends('layout')

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
                @if ($scoresheet->published)
                    <td>
                        ---
                    </td>
                    <td>
                        ---
                    </td>
                @else
                    <td>
                        <a href="/uploads/entries/{{ $scoresheet->entry->filename }}">Download</a>
                    </td>
                    <td>
                        <a href="/scoresheets/{{$scoresheet->id}}/upload">Upload</a>
                    </td>
                @endif
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
@stop


@section('sidebar')
    @include('admin.contacts')
@stop