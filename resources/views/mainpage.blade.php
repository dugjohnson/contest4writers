@extends('layout')

@section('content')
    @if(Auth::check() && ! Auth::user()->hasFilledInProfile())
        <div class="panel radius">
            <h4>Your user profile is incomplete</h4>
            <p>Please complete your user profile.  No entries with an incomplete author profile will be able to be judged.</p>
            <p>If you are a publisher entering one of your authors you will need to fill in a profile for those authors</p>
        </div>
    @endif
    <div class="panel radius">
        <P><B>Welcome to the&nbsp;Daphne du Maurier Award for Excellence in Mystery/Suspense contest.</B></p>

        <P>This site is the one stop place for both contestants and judges. Please bookmark this page for all your
            contest needs. </p>

        <P>For information about the contests, categories, rules, etc., please go to: <A
                    HREF="https://www.rwakissofdeath.org/rwakissofdeath-org-contest/">https://www.rwakissofdeath.org/rwakissofdeath-org-contest/</A></p>

        <P>- <B>To judge</B>: Click on Judges to view and update your judge preferences. When judging begins, you will also find the entries
            to judge here. More specific instruction will be emailed to you after March 15. </p>

        <P>Thank you for being with us! </p>

        <P>The Daphne du Maurier Contest Committee</p>
    </div>
@stop
