@extends('layout')

@section('content')
    @include('user.contact')

@stop

@section('sidebar')
    @if ($isCoordinator and Auth::id()==$user->id)
        <a href="/coordinators/entries" class="button radius">Back to Coordinator Entries</a>
        <a href="/coordinators/scoresheets" class="button radius">Back to Coordinator Scoresheets</a>
    @endif
    @if (Auth::id()==$user->id)
        <a class="button radius" href="/users/{{$user->id}}/edit">Edit Profile</a>
    @endif
@stop
