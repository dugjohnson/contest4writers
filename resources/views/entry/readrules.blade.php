<div class="panel radius">
    <p>
        <flux:field>
            <flux:checkbox name="readRules" value="1" :checked="$entry->readRules" label="Check before continuing"/>
        </flux:field>
        I have read the rules and guidelines governing The Daphne du Maurier Award for Excellence in
        Mystery/Suspense Contest. I attest to my eligibility.  I understand that judging is subjective and
        agree to abide by these rules and will accept the decisions of the judges and contest committee as final. I
        agree to hold harmless the Mystery/Suspense Chapter #144 of the Romance Writers of America&reg;, the contest
        committee and contest judges for any and all disputes arising from this contest or from circumstances beyond
        their control.
    </p>
    <!-- Title Form Input -->
    <flux:field>
        <flux:label>Signed (type your name):</flux:label>
        <flux:input name="signed" value="{{ $entry->signed }}"/>
    </flux:field>

</div>
