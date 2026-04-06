<input type="hidden" name="isCoordinator" value="{{ $isCoordinator }}">

<!-- Category Form Input -->
<flux:field>
    <flux:label>Entry is Complete:</flux:label>
    <flux:select name="received">
        <flux:select.option value="0" :selected="$entry->received == '0'">No</flux:select.option>
        <flux:select.option value="1" :selected="$entry->received == '1'">Yes</flux:select.option>
    </flux:select>
</flux:field>
<!-- Category Form Input -->
<flux:field>
    <flux:label>Entry is Finalist:</flux:label>
    <flux:select name="finalist">
        <flux:select.option value="0" :selected="$entry->finalist == '0'">No</flux:select.option>
        <flux:select.option value="1" :selected="$entry->finalist == '1'">Yes</flux:select.option>
    </flux:select>
</flux:field>
