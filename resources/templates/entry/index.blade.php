@extends('layout')

@section('content')

    <ul class="button-group">
        <li><a href="/entries/create/pub" class="button radius">Enter Published Contest</a></li>
        <li><a href="/entries/create/unpub" class="button radius">Enter Unpublished Contest</a></li>
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
                <td><a href="/entries/{{ $entry->id }}">Show</a> / <a href="/entries/{{ $entry->id }}/edit">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('sidebar')
    <div panel radius>
    <p>For multiple entries you can make one RWA invoice using the same invoice number to complete your entries. Please
        edit each entry when you are finished to input the invoice number. Each entry will generate an individual confirmation email.</p>
    </div>
@stop

