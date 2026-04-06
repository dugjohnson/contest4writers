<div class="panel callout radius">
    <!-- Invoice Number Form Input -->
    @if($entry->id)
        <flux:field>
            @if( Auth::user()->isAdministrator() )
                <flux:label>Transaction number from PayPal:</flux:label>
                <flux:input name="invoiceNumber" value="{{ $entry->invoiceNumber }}" maxlength="20"/>
            @else
                Transaction number from PayPal: {{$entry->invoiceNumber}}
                <input type="hidden" name="invoiceNumber" value="{{ $entry->invoiceNumber }}">
            @endif
        </flux:field>
    @endif
    <p>You will be able to pay your entry fee after completing this entry form.</p>
    <p>Payments will be processed using PayPal, Credit Card (through PayPal),
        Personal check on US bank, or Money Order in US funds.
        In order for your entry to be official your payment must be received</p>

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
