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
        <p>For multiple entries you can make one RWA invoice using the same invoice number to complete your entries.
            Please
            edit each entry when you are finished to input the invoice number.</p>
        <a class="button radius" href="http://www.rwa.org/unpublisheddaphne" target="_blank">Click to go to myRWA
            UNPUBLISHED www.rwa.org/unpublisheddaphne</a>
        <a class="button radius" href="http://www.rwa.org/publisheddaphne" target="_blank">Click to go to myRWA
            PUBLISHED www.rwa.org/publisheddaphne</a>

        <p> Each entry will generate an individual confirmation email. Those emails will be delayed for a short time.
            You can confirm that your entry in the area to the left after you've entered it.</p>

    </div>
@stop

