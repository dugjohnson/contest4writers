@extends('layout')

@section('content')
    <table>
        <thead>
        <tr>
            <td>Category</td>
            <td>Count</td>
            <td>Published</td>
        </tr>
        </thead>
        <tbody>
        @foreach($categoryCounts as $count)
            <tr>
                <td>{{$count->category}}</td>
                <td>{{ $count->categorycount }}</td>
                <td>{{($count->published?'Yes':'No')}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>

    <table>
        <thead>
        <tr>
            <td>Title</td>
            <td>Author</td>
            <td>Category</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($entries as $entry)
            <tr>
                <td>{{ $entry->title }}</td>
                <td>{{ $entry->author }}</td>
                <td>{{ $entry->category }}</td>
                <td><a href="/entries/{{ $entry->id }}">Show</a> / <a href="/entries/{{ $entry->id }}/edit">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop

@section('sidebar')
@stop

