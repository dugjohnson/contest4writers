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
    {!! Form::select('category', $categories, $entry->category , ['class' => 'form-control']) !!}
</div>
<!-- Invoice Number Form Input -->
<div class="form-group">
    {!! Form::label('invoiceNumber', 'Invoice Number (5 digits from myRWA):') !!}
    {!! Form::text('invoiceNumber',$entry->invoiceNumber, ['class' => 'form-control','maxlength'=>'5']) !!}
</div>
