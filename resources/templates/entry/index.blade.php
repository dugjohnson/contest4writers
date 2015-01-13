@extends('layout')

@section('content')

    <ul class="button-group">
        <li><a href="/entries/create/pub" class="button">Create Published Entry</a></li>
        <li><a href="/entries/create/unpub" class="button">Create Unpublished Entry</a></li>
    </ul>
    
    <div class="panel"><p>If the person logged in has made previous entries, they will show up in the grid below, otherwise it will be empty space</p></div>
    <table>
        <thead>
        <tr>
            <td>Title</td>
            <td>Author</td>
            <td>Action</td>
        </tr>
        </thead>
        <tr>
            <td>My Life as a Doug</td>
            <td>Doug Johnson</td>
            <td>Show/Edit</td>
        </tr>
        <tr>
            <td>Yes He Did, Two</td>
            <td>Miranda Esplana</td>
            <td>Show/Edit</td>
        </tr>
        <tr>
            <td>100 Years a Boxcar</td>
            <td>Willie Wenderer</td>
            <td>Show/Edit</td>
        </tr>

    </table>
@stop
