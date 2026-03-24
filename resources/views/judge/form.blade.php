<input type="hidden" name="user_id" value="{{ $judge->user_id }}">
<h5>Judge name: {{$judge->judgeName()}}</h5>

<div class="{{ empty($judge->judgeThisYear) ? 'form-group bg-gray-200 border-2 border-red-500 p-3' : 'form-group' }}">
    <div class="form-group">
        <h4>Judging this year:</h4>
        <flux:radio.group name="judgeThisYear" label="Pick one" :value="$judge->judgeThisYear">
            <flux:radio value="LJ" label="I would love to judge this year" />
            <flux:radio value="NY" label="I am not able to judge this year" />
            <flux:radio value="RM" label="Please remove me from judging list" />
        </flux:radio.group>
    </div>
</div>

<div class="{{ (empty($judge->emergencyJudgeUnpub) || empty($judge->emergencyJudgePub)) ? 'form-group bg-gray-200 border-2 border-red-500 p-3' : 'form-group' }}">
    <p><strong>Emergency Judges</strong> are needed in the last few days of the judging period.
        Judges will need to be able to quickly read an entry and fill in the scoresheet.
        Typically judges have 48 hours to complete emergency assignments.</p>


    <flux:field>
        <flux:radio.group name="emergencyJudgeUnpub" label="I am willing to be an emergency judge for Unpublished:" :value="$judge->emergencyJudgeUnpub">
            <flux:radio value="T" label="Yes" />
            <flux:radio value="F" label="No" />
        </flux:radio.group>
    </flux:field>

    <flux:field>
        <flux:radio.group name="emergencyJudgePub" label="I am willing to be an emergency judge for Published:" :value="$judge->emergencyJudgePub">
            <flux:radio value="T" label="Yes" />
            <flux:radio value="F" label="No" />
        </flux:radio.group>
    </flux:field>
</div>

<flux:field>
    <flux:label>Maximum number of published entries I will judge</flux:label>
    <flux:input type="text" name="maxpubentries" value="{{ $judge->maxpubentries }}" size="2" maxlength="2" />
</flux:field>

<flux:field>
    <flux:label>Maximum number of unpublished entries I will judge</flux:label>
    <flux:input type="text" name="maxunpubentries" value="{{ $judge->maxunpubentries }}" size="2" maxlength="2" />
</flux:field>

<p>All entries will be accessed through this site on your page as a downloadable file in the PDF
    format. You will receive an email when your entries are available around March 26th. </p>
<p>Due to the Daphne's continued popularity we often find some categories with more entries
    than expected and truly appreciate judges who are willing to
    take entries from more than one category to even out distribution. If you can help in this
    way, please leave all preferences as Love to judge.</p>

<h4>Category Preferences</h4>
<p>Please select a preference level for each entry category.</p>
<p>If you are entered in one of the categories as either published or unpublished, you may judge
    in the sister division.
    For example you're entered in mainstream published, you can judge mainstream unpublished,
    and vise versa. </p>

<flux:field>
    <flux:label>Mainstream</flux:label>
    <flux:select name="mainstream">
        @foreach($preferenceLevels as $value => $label)
            <option value="{{ $value }}" @selected($judge->mainstream == $value)>{{ $label }}</option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Short (40k-65k words)</flux:label>
    <flux:select name="shortTitle">
        @foreach($preferenceLevels as $value => $label)
            <option value="{{ $value }}" @selected($judge->shortTitle == $value)>{{ $label }}</option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Historical</flux:label>
    <flux:select name="historical">
        @foreach($preferenceLevels as $value => $label)
            <option value="{{ $value }}" @selected($judge->historical == $value)>{{ $label }}</option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Long (65k+ words)</flux:label>
    <flux:select name="longTitle">
        @foreach($preferenceLevels as $value => $label)
            <option value="{{ $value }}" @selected($judge->longTitle == $value)>{{ $label }}</option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Paranormal</flux:label>
    <flux:select name="paranormal">
        @foreach($preferenceLevels as $value => $label)
            <option value="{{ $value }}" @selected($judge->paranormal == $value)>{{ $label }}</option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Novella (less than 40K words)</flux:label>
    <flux:select name="novella">
        @foreach($preferenceLevels as $value => $label)
            <option value="{{ $value }}" @selected($judge->novella == $value)>{{ $label }}</option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Cozy</flux:label>
    <flux:select name="cozy">
        @foreach($preferenceLevels as $value => $label)
            <option value="{{ $value }}" @selected($judge->cozy == $value)>{{ $label }}</option>
        @endforeach
    </flux:select>
</flux:field>

<p>I'd be happy to judge a story with these elements</p>

<flux:field>
    <flux:radio.group name="erotic" label="Sex/sensuality on the page:" :value="$judge->erotic ? '1' : '0'">
        <flux:radio value="1" label="Yes" />
        <flux:radio value="0" label="No" />
    </flux:radio.group>
</flux:field>

<flux:field>
    <flux:radio.group name="glbt" label="LGBTQ+:" :value="$judge->glbt ? '1' : '0'">
        <flux:radio value="1" label="Yes" />
        <flux:radio value="0" label="No" />
    </flux:radio.group>
</flux:field>

<flux:field>
    <flux:radio.group name="bdsm" label="Violence (including physical and sexual assault) on the page:" :value="$judge->bdsm ? '1' : '0'">
        <flux:radio value="1" label="Yes" />
        <flux:radio value="0" label="No" />
    </flux:radio.group>
</flux:field>

<flux:field>
    <flux:radio.group name="childdeath" label="Child death/near death on the page:" :value="$judge->childdeath ? '1' : '0'">
        <flux:radio value="1" label="Yes" />
        <flux:radio value="0" label="No" />
    </flux:radio.group>
</flux:field>

<div class="form-group">
    <!-- Comments or Notes field is currently disabled -->
    <!-- <flux:field>
        <flux:label>Comments or Notes</flux:label>
        <flux:textarea name="comments" rows="4">{{ $judge->comments }}</flux:textarea>
    </flux:field> -->
</div>
