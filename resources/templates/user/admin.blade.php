@extends('layout')

@section('content')
    @include('user.contact')

@stop

@section('sidebar')
        <a class="button radius" href="/users">Return</a>
        <a class="button radius" href="/users/{{$user->id}}/edit">Edit Profile</a>
@stop
