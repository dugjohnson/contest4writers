@extends('layout')

@section('content')
    @include('judge.info')
    @if($isAdministrator)
        @include('judge.infoAdmin')
    @endif
    @if ($isCoordinator)
        <a href="/coordinators/judges" class="button radius">Back to Coordinator Judges</a>
        <a href="/coordinators/scoresheets" class="button radius">Back to Coordinator Scoresheets</a>
        @include('judge.deleteform')
    @else
        <a href="/judges" class="button radius">Return</a>
    @endif

@stop
