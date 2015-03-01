@extends('layout-nonav')

@section('content')
    <table>
        <thead>
        <tr>
            <td>Entry</td>
            <td>Title</td>
            <td>Category</td>
            <td>Published</td>
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
                    <a href="/scoresheets/{{$scoresheet->id}}">Show</a>  /
                    <a href="/scoresheets/{{$scoresheet->id}}/edit">Edit</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
