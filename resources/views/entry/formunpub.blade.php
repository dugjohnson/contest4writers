<!-- Author Name Form Input -->
<flux:field>
    <flux:label>Author Writing Name:</flux:label>
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
<div class="panel radius">
    <p>Optional: Only fill in if two authors worked on this entry.</p>
    <!-- Author Name Form Input -->
    <flux:field>
        <flux:label>Author 2 Writing Name:</flux:label>
        <flux:input name="author2" value="{{ $entry->author2 }}" />
    </flux:field>
    <!-- Author Name Form Input -->
    <flux:field>
        <flux:label>Author 2 Email:</flux:label>
        <flux:input name="author2Email" value="{{ $entry->author2Email }}" />
    </flux:field>
</div>
@include('entry.elements')
