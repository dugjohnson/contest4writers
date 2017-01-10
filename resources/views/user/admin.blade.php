@extends('layout')

@section('content')
    @include('user.contact')

@stop

@section('sidebar')
        <a class="button radius" href="/users">Return to users page</a>
        <a class="button radius" href="/coordinators/judges">Return to judges page</a>
        <a class="button radius" href="/coordinators/scoresheets">Return to scoresheets page</a>
        <a class="button radius" href="/users/{{$user->id}}/edit">Edit Profile</a>
@stop
