<div>
    <p>My story has these elements</p>
    <!-- Erotic Form Input -->
    <flux:field>
        <flux:label>Sex/sensuality on the page:</flux:label>
        <div>
            <input type="radio" name="erotic" value="1" @checked($entry->erotic == 1)> Yes
            <input type="radio" name="erotic" value="0" @checked($entry->erotic == 0)> No
        </div>
    </flux:field>
    <flux:field>
        <flux:label>LGBTQ+:</flux:label>
        <div>
            <input type="radio" name="glbt" value="1" @checked($entry->glbt == 1)> Yes
            <input type="radio" name="glbt" value="0" @checked($entry->glbt == 0)> No
        </div>
    </flux:field>
    <flux:field>
        <flux:label>Violence (including physical and sexual assault) on the page:</flux:label>
        <div>
            <input type="radio" name="bdsm" value="1" @checked($entry->bdsm == 1)> Yes
            <input type="radio" name="bdsm" value="0" @checked($entry->bdsm == 0)> No
        </div>
    </flux:field>
    <flux:field>
        <flux:label>Child death/near death on the page:</flux:label>
        <div>
            <input type="radio" name="childdeath" value="1" @checked($entry->childdeath == 1)> Yes
            <input type="radio" name="childdeath" value="0" @checked($entry->childdeath == 0)> No
        </div>
    </flux:field>
</div>
