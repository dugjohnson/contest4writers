@extends('layout')

@section('content')
    @if(($app->environment('local') || Carbon\Carbon::now()>= Carbon\Carbon::create($contest_year,1,15,0,0,0,'America/Denver'))
            && (Carbon\Carbon::now()< Carbon\Carbon::create($contest_year,3,16,0,0,0,'America/Denver')))
        <ul class="button-group">
            <li><a href="/entries/create/pub" class="button radius">Enter Published Contest</a></li>
            <li><a href="/entries/create/unpub" class="button radius">Enter Unpublished Contest</a></li>
        </ul>
    @else
        <h4><strong>The competition entry period is January&nbsp;15 through March&nbsp;15</strong></h4>
    @endif
    @include('entry.entryListing')
    <div class="panel radius">
        <H3>Things to know before entering the contest:</H3>
        <ul class="infolist">
            <li><strong>Make sure your profile is complete. Click Check Your Profile above to review. <br>The author profile must be complete for the entry to be judged.</strong></li>
            <li>Review the rules, categories, etc. about the contest at: <A HREF="http://www.rwakissofdeath.org/daphne">http://www.rwakissofdeath.org/daphne</A>
            </li>
            <li>Each entry will generate an individual confirmation email. You can view your entry in the area to the
                left after you've entered it.
            </li>
            <li>
                Each entry will generate an individual confirmation email. Those emails could be delayed for a short time.
                You can confirm that your entry in the area to the left after you've entered it.
            </li>
        </ul>
    </div>
@stop

@section('sidebar')
    @include('admin.contacts')
@stop

