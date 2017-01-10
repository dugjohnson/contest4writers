<div class="panel callout radius">
    <!-- Invoice Number Form Input -->
    <div class="form-group">
        {!! Form::label('invoiceNumber', 'Invoice Number (5 digits from myRWA):') !!}
        {!! Form::text('invoiceNumber',$entry->invoiceNumber, ['class' => 'form-control','maxlength'=>'5']) !!}
    </div>
    <p>Payments will be maintained through myRWA invoicing and may be submitted using PayPal, Credit Card,
        Personal check on US bank, or Money Order in US funds.
        In order for your entry to be official, you must create a myRWA invoice.</p>

    <p>Personal checks and money orders must be postmarked no later than March 16, 2017, made payable to Kiss of
        Death and sent to the chapter treasurer per the instructions on the myRWA invoice. Please include your
        invoice and entry numbers on your payment.</p>

    <p> Entries without completed entry form and payment will not be judged.</p>
    @if($entry->published)
        <p>Entry Fee: $30</p>
    @else
        <p>Entry Fee: $15 for KOD members; $30 non-KOD members.</p>
    @endif
</div>