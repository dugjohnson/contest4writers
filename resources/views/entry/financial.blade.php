<div class="panel callout radius">
    <!-- Invoice Number Form Input -->
    @if($entry->id)
        <div class="form-group">
            @if( Auth::user()->isAdministrator() )
                {!! Form::label('invoiceNumber', 'Transaction number from PayPal:') !!}
                {!! Form::text('invoiceNumber',$entry->invoiceNumber, ['class' => 'form-control','maxlength'=>'20']) !!}

            @else
                Transaction number from PayPal: {{$entry->invoiceNumber}}
                {{ Form::hidden('invoiceNumber', $entry->invoiceNumber) }}
            @endif
        </div>
    @endif
    <p>You will be able to pay your entry fee after completing this entry form.</p>
    <p>Payments will be processed using PayPal, Credit Card (through PayPal),
        Personal check on US bank, or Money Order in US funds.
        In order for your entry to be official your payment must be received</p>

    <p><strong>We are currently re=activating our PayPal account interface to receive payments. We will let you know as soon as you can pay with PayPal.
        Your entry is marked for when it was received, so you will not be penalized by our delay of payment ability.</strong></p>

    <p>Personal checks and money orders must be postmarked no later than the next business day after close of
        contest--see rules.
        made payable to Kiss of Death and sent to the chapter treasurer per the instructions in your confirmation
        email. Please include your
        entry number on your payment.</p>

    <p> Entries without completed entry form and payment will not be judged.</p>
    @if($entry->published)
        <p>Entry Fee: $15 for members of KOD; $30 for non-members.</p>
    @else
        <p>Entry Fee: $15 for members of KOD; $30 for non-members.</p>
    @endif
</div>
