<flux:fieldset>
    <flux:legend>TIE BREAKER STATEMENT</flux:legend>
    <p class="text-sm text-gray-600 mb-4">Please select the statement that best describes this particular entry, which will be added to the total score ONLY
        in the event of a tie.</p>

    <flux:field>
        <flux:label>Tiebreaker:</flux:label>
        <flux:select name="tiebreaker" id="tiebreaker">
            @foreach($tieBreakerList as $value => $label_text)
                <flux:select.option value="{{ $value }}" :selected="$scoresheet->sheet->tiebreaker == $value">{{ $label_text }}</flux:select.option>
            @endforeach
        </flux:select>
    </flux:field>
</flux:fieldset>

<flux:fieldset class="mt-8">
    <flux:legend>OVERALL MANUSCRIPT COMMENTS</flux:legend>

    <flux:field>
        @if (! $scoresheet->published)
            <p class="text-sm text-gray-600 mb-2">Please use this area to provide additional thoughts or comments not included above or on the manuscript</p>
        @endif
        <flux:label>Comments:</flux:label>
        <flux:textarea name="commentFinal">{{ $scoresheet->sheet->comments->commentFinal }}</flux:textarea>
    </flux:field>
</flux:fieldset>

<flux:fieldset class="mt-8">
    <flux:field>
        <flux:label>Judge name (optional):</flux:label>
        <flux:input name="judgeName" value="{{ $scoresheet->sheet->judgeName }}" />
    </flux:field>
</flux:fieldset>
