@extends('layout-nonav')

@section('content')
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
                <td><a href="/coordinators/users/{{ $entry->user_id }}">{{ $entry->author }}</a></td>
                <td>{{ $entry->category }}</td>
                <td>{!! ($entry->published?'Yes':'No') !!}</td>
                <td><a href="/coordinators/entries/{{ $entry->id }}">Show</a> / <a href="/coordinators/entries/{{ $entry->id }}/edit">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/coordinators" class="button radius">Return</a>
    @stop