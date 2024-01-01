@extends('layout')

@section('content')
    @if( (app()->isLocal()) || (Carbon\Carbon::now()>= Carbon\Carbon::create($contest_year,1,1,0,0,0,'America/Denver'))
            && (Carbon\Carbon::now()< Carbon\Carbon::create($contest_year,3,16,0,0,0,'America/Denver')))
        <ul class="button-group">
            <li><a href="/entries/create/pub" class="button radius">Enter Published Contest</a></li>
            <li><a href="/entries/create/unpub" class="button radius">Enter Unpublished Contest</a></li>
        </ul>
        @include('entry.entryListing')
    @else
        <h4><strong>The competition entry period is <br/> January 1st 00:00 through March&nbsp;15 24:00 (America/Denver time)</strong></h4>
       <p><a href="https://www.rwakissofdeath.org/kodcontest/">Click here to go to the Kiss of Death website for updates</a></p>
    @endif
    <div class="panel radius">
        <H3>Things to know before entering the contest:</H3>
        <ul class="infolist">
            <li><strong>Make sure your profile is complete. Click Check Your Profile above to review. <br>The author profile must be complete for the entry to be judged.</strong></li>
            <li>Review the rules, categories, etc. about the contest at: <A HREF="https://www.rwakissofdeath.org/kodcontest/">https://www.rwakissofdeath.org/kodcontest/</A>
            </li>
            <li>Each entry should generate an individual confirmation email.
            </li>
            <li>Alternatively, you can view your entry by clicking the show button next to your entry</li>
        </ul>
        <h4><strong>The competition entry period is extended<br/>through March&nbsp;22 24:00 (America/Denver time)</strong></h4>
    </div>
@stop

@section('sidebar')
   <x-writing.contacts />
@stop

