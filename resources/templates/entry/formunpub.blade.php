<!-- Author Name Form Input -->
<div class="form-group">
    {!! Form::label('author', 'Author Writing Name:') !!}
    {!! Form::text('author',$entry->author, ['class' => 'form-control']) !!}
</div>
<!-- Author Name Form Input -->
<div class="form-group">
    {!! Form::label('authorEmail', 'Author Email:') !!}
    {!! Form::text('authorEmail',$entry->authorEmail, ['class' => 'form-control']) !!}
</div>
<!-- Title Form Input -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title',$entry->title, ['class' => 'form-control']) !!}
</div>
<!-- Category Form Input -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', $categories, $entry->category , ['class' => 'form-control']) !!}
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
        {!! Form::label('author2firstName', 'Author 2 First Name:') !!}
        {!! Form::text('author2firstName',$entry->author2firstName, ['class' => 'form-control']) !!}
    </div>
    <!-- Author Name Form Input -->
    <div class="form-group">
        {!! Form::label('author2lastName', 'Author 2 Last Name:') !!}
        {!! Form::text('author2lastName',$entry->author2lastName, ['class' => 'form-control']) !!}
    </div>
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