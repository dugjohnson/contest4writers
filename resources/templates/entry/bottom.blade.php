<div class="panel">
    <p>Payments will be maintained through myRWA invoicing and may be submitted using PayPal, Credit Card,
        Personal check on US bank, or Money Order in US funds.
        In order for your entry to be official, you must create a myRWA invoice.</p>

    <p>Personal checks and money orders must be postmarked no later than March 16, 2015, made payable to Kiss of
        Death and sent to the chapter treasurer per the instructions on the myRWA invoice. Please include your
        invoice and entry numbers on your payment.</p>

    <p> Entries without completed entry form and payment will not be judged.</p>

    <p>Entry Fee: $15 for KOD members; $30 non-KOD members.</p>
    <a class="tiny button" href="http://www.rwa.org/e/in/eid=297" target="_blank">Go to myRWA</a>
</div>
<div class="panel">
    <p>
        {!! Form::checkbox('iAgree', '0', null, ['id' => 'iAgree']) !!}
        I have read the rules and guidelines governing The Daphne du Maurier Award for Excellence in
        Mystery/Suspense
        Contest for published writers and attest to my eligibility.  I understand that judging is subjective and
        agree
        to abide by these rules and will accept the decisions of the judges and contest committee as final. I agree
        to
        hold harmless the Mystery/Suspense Chapter #144 of the Romance Writers of America&reg;, the contest
        committee and
        contest judges for any and all disputes arising from this contest or from circumstances beyond their
        control.</p>
</div>
{!! Form::submit('Submit!', array('class'=>'button')) !!}
{!! Form::close() !!}