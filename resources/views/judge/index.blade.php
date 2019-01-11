@extends('layout')
@section('content')
    <p>Thank you for taking the time to visit the judge database for the Daphne du Maurier Award for Excellence.</p>
    <p>Whether you’re new to judging or updating your preferences we’re happy you’re here. Please sign up or complete your updates now and we'll
        be in touch as the contest entry period winds down the 15th of March.</p>
    <p>Deadline for judging Unpublished entries is on or about the 15th of April.</p>
    <p>Deadline for judging Published books is on or about the 15th of May.</p>
    <p>Please check your calendars as these deadlines for returning entries are firm. We will
        be able to provide exact deadlines when entries are issued for judging.</p>
    <p>Review your information, please complete or update as necessary. </p>
    @if($isJudge)
        @if($judge->hasScoresheets())
            <a href="/scoresheets" class="button radius">Scoresheets I am judging</a>
        @endif
        @if($judge->judgeThisYear)
            <a href="/judges/{{$judge->id}}" class="button radius">View my judge preferences</a>
        @endif
        <a href="/judges/{{$judge->id}}/edit" class="button radius">Update my judge preferences</a>
    @else
        <a href="/judges/create" class="button radius">I'd like to be a Judge</a>
    @endif
@stop

@section('sidebar')
    @include('admin.contacts')
    @stop

