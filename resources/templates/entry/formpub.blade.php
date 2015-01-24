<!-- Entered By Publisher Form Input -->
<div class="form-group">
    {!! Form::hidden('enteredByPublisher', true, ['class' => 'form-control']) !!}
    <label>{!! Form::checkbox('enteredByPublisher', null, false, ['class' => 'form-control']) !!}
        &nbsp; &nbsp;Entered By Publisher (not Author)</label>
</div>
<!-- Author Name Form Input -->
<div class="form-group">
    {!! Form::label('author', 'Author Name:') !!}
    {!! Form::text('author',$entry->author, ['class' => 'form-control']) !!}
</div>
<!-- Title Form Input -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title',$entry->title, ['class' => 'form-control']) !!}
</div>
<!-- Category Form Input -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', $categories , $entry->category , ['class' => 'form-control']) !!}
</div>
<!-- Publisher Form Input -->
<div class="form-group">
    {!! Form::label('publisher', 'Publisher:') !!}
    {!! Form::text('publisher',$entry->publisher, ['class' => 'form-control']) !!}
</div>
<!-- Editor Form Input -->
<div class="form-group">
    {!! Form::label('editor', 'Editor:') !!}
    {!! Form::text('editor',$entry->editor, ['class' => 'form-control']) !!}
</div>
<!-- Publication Month Form Input -->
<div class="form-group">
    {!! Form::label('publicationMonth', 'Publication or Release Month (see rules):') !!}
    {!! Form::select('publicationMonth', $monthlist, $entry->publicationMonth, ['class' => 'form-control']) !!}
</div>
<!-- Invoice Number Form Input -->
<div class="form-group">
    {!! Form::label('invoiceNumber', 'Invoice Number (5 digits from myRWA):') !!}
    {!! Form::text('invoiceNumber',$entry->invoiceNumber, ['class' => 'form-control','maxlength'=>'5']) !!}
</div>
<div class="panel radius">
    <p>Optional: Only fill in if two authors worked on this entry. If there is a second author, fill in all fields</p>
    <!-- Author Name Form Input -->
    <div class="form-group">
        {!! Form::label('author2', 'Author 2 Writing Name:') !!}
        {!! Form::text('author2',$entry->author2, ['class' => 'form-control']) !!}
    </div>
    <!-- Author Name Form Input -->
    <div class="form-group">
        {!! Form::label('author2Email', 'Author 2 Email:') !!}
        {!! Form::text('author2Email',$entry->author2Email, ['class' => 'form-control']) !!}
    </div>
</div>
