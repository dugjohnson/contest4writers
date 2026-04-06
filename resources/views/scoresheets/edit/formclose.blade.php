<flux:fieldset>
    <flux:legend>Save or Save & Complete</flux:legend>
    <!--see scoresheet.js for handling of submits-->
    <input type="hidden" name="process_method" id="process_method" value="">

    <div class="flex gap-4 mt-4">
        <flux:button type="button" id="submitButton" variant="primary">Save Edits</flux:button>
        <flux:button type="button" id="completeButton" variant="filled" class="ml-auto">Scoresheet is Complete</flux:button>
    </div>
</flux:fieldset>
