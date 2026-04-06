<flux:field>
    <flux:checkbox name="enteredByPublisher" value="1" :checked="$entry->enteredByPublisher" label="Entered By Publisher (not Author)" />
</flux:field>
<!-- Author Name Form Input -->
<flux:field>
    <flux:label>Author Name:</flux:label>
    <flux:input name="author" value="{{ $entry->author }}" />
</flux:field>
<!-- Author Name Form Input -->
<flux:field>
    <flux:label>Author Email:</flux:label>
    <flux:input name="authorEmail" value="{{ $entry->authorEmail }}" />
</flux:field>

<!-- Title Form Input -->
<flux:field>
    <flux:label>Title:</flux:label>
    <flux:input name="title" value="{{ $entry->title }}" />
</flux:field>
<!-- Publisher Form Input -->
<flux:field>
    <flux:label>Publisher:</flux:label>
    <flux:input name="publisher" value="{{ $entry->publisher }}" />
</flux:field>
<!-- Editor Form Input -->
<flux:field>
    <flux:label>Editor:</flux:label>
    <flux:input name="editor" value="{{ $entry->editor }}" />
</flux:field>
<!-- Publication Month Form Input -->
<flux:field>
    <flux:label>Publication or Release Month (see rules):</flux:label>
    <flux:select name="publicationMonth">
        @foreach($monthlist as $val => $label)
            <flux:select.option value="{{ $val }}" :selected="$val == $entry->publicationMonth">{{ $label }}</flux:select.option>
        @endforeach
    </flux:select>
</flux:field>
@include('entry.elements')
