<input type="hidden" name="user_id" value="{{ $judge->user_id }}">
<h5>Judge name: {{$judge->judgeName()}}</h5>

<div class="{{ empty($judge->judgeThisYear) ? 'form-group bg-gray-200 border-2 border-red-500 p-3' : 'form-group' }}">
    <div class="form-group">
        <h4>Judging this year:</h4>
        <label>Pick one</label>
        <div>
            <input type="radio" name="judgeThisYear" value="LJ" @checked($judge->judgeThisYear == 'LJ') id="judgeThisYear_LJ">
            <label for="judgeThisYear_LJ">I would love to judge this year</label>
        </div>
        <div>
            <input type="radio" name="judgeThisYear" value="NY" @checked($judge->judgeThisYear == 'NY') id="judgeThisYear_NY">
            <label for="judgeThisYear_NY">I am not able to judge this year</label>
        </div>
        <div>
            <input type="radio" name="judgeThisYear" value="RM" @checked($judge->judgeThisYear == 'RM') id="judgeThisYear_RM">
            <label for="judgeThisYear_RM">Please remove me from judging list</label>
        </div>
    </div>
</div>

<div class="{{ (empty($judge->emergencyJudgeUnpub) || empty($judge->emergencyJudgePub)) ? 'form-group bg-gray-200 border-2 border-red-500 p-3' : 'form-group' }}">
    <p><strong>Emergency Judges</strong> are needed in the last few days of the judging period.
        Judges will need to be able to quickly read an entry and fill in the scoresheet.
        Typically judges have 48 hours to complete emergency assignments.</p>


    <div class="form-group">
        <label>I am willing to be an emergency judge for Unpublished:</label>
        <div>
            <input type="radio" name="emergencyJudgeUnpub" value="T" @checked($judge->emergencyJudgeUnpub) id="emergencyJudgeUnpub_T">
            <label for="emergencyJudgeUnpub_T">Yes</label>
        </div>
        <div>
            <input type="radio" name="emergencyJudgeUnpub" value="F" @checked(!$judge->emergencyJudgeUnpub) id="emergencyJudgeUnpub_F">
            <label for="emergencyJudgeUnpub_F">No</label>
        </div>
    </div>

    <div class="form-group">
        <label>I am willing to be an emergency judge for Published:</label>
        <div>
            <input type="radio" name="emergencyJudgePub" value="T" @checked($judge->emergencyJudgePub) id="emergencyJudgePub_T">
            <label for="emergencyJudgePub_T">Yes</label>
        </div>
        <div>
            <input type="radio" name="emergencyJudgePub" value="F" @checked(!$judge->emergencyJudgePub) id="emergencyJudgePub_F">
            <label for="emergencyJudgePub_F">No</label>
        </div>
    </div>
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
            <flux:select.option value="{{ $value }}" :selected="$judge->mainstream == $value">{{ $label }}</flux:select.option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Short (40k-65k words)</flux:label>
    <flux:select name="shortTitle">
        @foreach($preferenceLevels as $value => $label)
            <flux:select.option value="{{ $value }}" :selected="$judge->shortTitle == $value">{{ $label }}</flux:select.option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Historical</flux:label>
    <flux:select name="historical">
        @foreach($preferenceLevels as $value => $label)
            <flux:select.option value="{{ $value }}" :selected="$judge->historical == $value">{{ $label }}</flux:select.option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Long (65k+ words)</flux:label>
    <flux:select name="longTitle">
        @foreach($preferenceLevels as $value => $label)
            <flux:select.option value="{{ $value }}" :selected="$judge->longTitle == $value">{{ $label }}</flux:select.option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Paranormal</flux:label>
    <flux:select name="paranormal">
        @foreach($preferenceLevels as $value => $label)
            <flux:select.option value="{{ $value }}" :selected="$judge->paranormal == $value">{{ $label }}</flux:select.option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Novella (less than 40K words)</flux:label>
    <flux:select name="novella">
        @foreach($preferenceLevels as $value => $label)
            <flux:select.option value="{{ $value }}" :selected="$judge->novella == $value">{{ $label }}</flux:select.option>
        @endforeach
    </flux:select>
</flux:field>

<flux:field>
    <flux:label>Cozy</flux:label>
    <flux:select name="cozy">
        @foreach($preferenceLevels as $value => $label)
            <flux:select.option value="{{ $value }}" :selected="$judge->cozy == $value">{{ $label }}</flux:select.option>
        @endforeach
    </flux:select>
</flux:field>

<p>I'd be happy to judge a story with these elements</p>

<div class="form-group">
    <label>Sex/sensuality on the page:</label>
    <div>
        <input type="radio" name="erotic" value="1" @checked($judge->erotic) id="erotic_1">
        <label for="erotic_1">Yes</label>
    </div>
    <div>
        <input type="radio" name="erotic" value="0" @checked(!$judge->erotic) id="erotic_0">
        <label for="erotic_0">No</label>
    </div>
</div>

<div class="form-group">
    <label>LGBTQ+:</label>
    <div>
        <input type="radio" name="glbt" value="1" @checked($judge->glbt) id="glbt_1">
        <label for="glbt_1">Yes</label>
    </div>
    <div>
        <input type="radio" name="glbt" value="0" @checked(!$judge->glbt) id="glbt_0">
        <label for="glbt_0">No</label>
    </div>
</div>

<div class="form-group">
    <label>Violence (including physical and sexual assault) on the page:</label>
    <div>
        <input type="radio" name="bdsm" value="1" @checked($judge->bdsm) id="bdsm_1">
        <label for="bdsm_1">Yes</label>
    </div>
    <div>
        <input type="radio" name="bdsm" value="0" @checked(!$judge->bdsm) id="bdsm_0">
        <label for="bdsm_0">No</label>
    </div>
</div>

<div class="form-group">
    <label>Child death/near death on the page:</label>
    <div>
        <input type="radio" name="childdeath" value="1" @checked($judge->childdeath) id="childdeath_1">
        <label for="childdeath_1">Yes</label>
    </div>
    <div>
        <input type="radio" name="childdeath" value="0" @checked(!$judge->childdeath) id="childdeath_0">
        <label for="childdeath_0">No</label>
    </div>
</div>

<div class="form-group">
    <!-- Comments or Notes field is currently disabled -->
    <!-- <flux:field>
        <flux:label>Comments or Notes</flux:label>
        <flux:textarea name="comments" rows="4">{{ $judge->comments }}</flux:textarea>
    </flux:field> -->
</div>
