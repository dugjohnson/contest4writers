@extends('layout')

@section('content')
    <p>First Name: {{ $firstName }}<p>
    <p>Last Name: {{ $lastName }}</p>
    <p>Writing/Author Name: {{ $writingName }}</p>
    <p>Email (Primary): {{ $email }}</p>
    <p>Email (Secondary): {{ $email2 }}</p>
    <p>Daytime Phone: {{ $phone1 }}</p>
    <p>Evening Phone: {{ $phone2 }}</p>
    <p>Alternate Phone: {{ $phone3 }}</p>
    <p>Street: {{ $street }}</p>
    <p>City: {{ $city }}
    <p>State: {{ $state }}
    <p>Zip: {{ $zipCode }}</p>
    <p>Country: {{ $country }}</p>

@stop

@section('sidebar')
    <a class="button radius" href="/users/{{$id}}/edit">Edit Profile</a>
@stop
