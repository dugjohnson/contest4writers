@extends('layout')

@section('content')

    <ul class="button-group">
        <li><a href="/entries/create/pub" class="button radius">Enter Published Contest</a></li>
        <li><a href="/entries/create/unpub" class="button radius">Enter Unpublished Contest</a></li>
    </ul>
    <table>
        <thead>
        <tr>
            <td>Entry #</td>
            <td>Title</td>
            <td>Author</td>
            <td>Category</td>
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
                <td><a href="/entries/{{ $entry->id }}">Show</a> / <a href="/entries/{{ $entry->id }}/edit">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('sidebar')
    <div panel radius>
        <P>Things to know before entering the contest:</P>
        <ul>
            <li>Make sure your profile is complete.  Click Check Your Profile above to review</li>
            <li>Review the rules, categories, etc. about the contest at: <A HREF="http://rwamysterysuspense.org/daphne">http://rwamysterysuspense.org/daphne</A></li>
            <li>Each entry will generate an individual confirmation email. You can view your entry in the area to the left after you've entered it.</li>
            <li>Multiple entries can be paid on one myRWA invoice.  After you have the invoice number, please edit each entry and add the invoice number in the appropriate field.</li>
        </ul>
        <a class="button radius" href="http://www.rwa.org/unpublisheddaphne" target="_blank">Click to go to myRWA
            UNPUBLISHED www.rwa.org/unpublisheddaphne</a>
        <a class="button radius" href="http://www.rwa.org/publisheddaphne" target="_blank">Click to go to myRWA
            PUBLISHED www.rwa.org/publisheddaphne</a>

        <p> Each entry will generate an individual confirmation email. Those emails will be delayed for a short time.
            You can confirm that your entry in the area to the left after you've entered it.</p>

    </div>
    @include('admin.contacts')
@stop

