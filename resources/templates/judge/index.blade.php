@extends('layout')
@section('content')
    <p>Thank you for taking the time to visit the judge database for the Daphne du Maurier Award for Excellence</p>
    <p>Whether you’re new to judging or updating your preferences we’re happy you’re here. If you decide to judge, we'll
        be in touch as the contest entry period winds down the 15th of March.</p>
    <p>Deadline for judging Unpublished entries is 15th of April.</p>
    <p>Deadline for judging Published books is 15th of May.</p>
    <p>Please check your calendars as these deadlines for returning entries are firm.</p>
    <p>Review your information, please complete or update as necessary. </p>
    <p>If you are an editor, agent or publisher of fiction for anything other than your own work, we appreciate your
        interest, but will have to ask you to pass.</p>
    @if($isJudge)
        @if($judge->judgeThisYear)
            <a href="/judges/{{$judge->id}}" class="button radius">View my judge preferences</a>
        @endif
        <a href="/judges/{{$judge->id}}/edit" class="button radius">Update my judge preferences</a>
        @if($judge->hasScoresheets())
            <a href="/scoresheets" class="button radius">Scoresheets I am judging</a>
        @endif
    @else
        <a href="/judges/create" class="button radius">I'd like to be a Judge</a>
    @endif
@stop

