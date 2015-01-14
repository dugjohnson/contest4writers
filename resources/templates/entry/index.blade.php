@extends('layout')

@section('content')

    <ul class="button-group">
        <li><a href="/entries/create/pub" class="button">Create Published Entry</a></li>
        <li><a href="/entries/create/unpub" class="button">Create Unpublished Entry</a></li>
    </ul>

    <table>
        <thead>
        <tr>
            <td>Title</td>
            <td>Author</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($entries as $entry)
        <tr>
            <td>{{ $entry->title }}</td>
            <td>{{ $entry->author }}</td>
            <td><a href="/entries/{{ $entry->id }}">Show</a> / <a href="/entries/{{ $entry->id }}/edit">Edit</a> </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@stop
