@extends('layout')

@section('content')
@include('user.contact')

@stop

@section('sidebar')
    @if ($isCoordinator)
        <a class="button radius" href="/coordinators/entries">Return</a>
        @else
    <a class="button radius" href="/users/{{$user->id}}/edit">Edit Profile</a>
    @endif
    
@stop
