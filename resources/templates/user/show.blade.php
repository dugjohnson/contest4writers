@extends('layout')

@section('content')
    @include('user.contact')

@stop

@section('sidebar')
    @if ($isCoordinator)
        <a href="/coordinators/entries" class="button radius">Back to Coordinator Entries</a>
        <a href="/coordinators/scoresheets" class="button radius">Back to Coordinator Scoresheets</a>
    @else
        <a class="button radius" href="/users/{{$user->id}}/edit">Edit Profile</a>
    @endif

@stop
