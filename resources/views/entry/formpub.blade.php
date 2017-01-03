<!-- Entered By Publisher Form Input -->
<div class="form-group">
    <label>{!! Form::checkbox('enteredByPublisher', null , $entry->enteredByPublisher, ['class' => 'form-control']) !!}
        &nbsp; &nbsp;Entered By Publisher (not Author)</label>
</div>
<!-- Author Name Form Input -->
<div class="form-group">
    {!! Form::label('author', 'Author Name:') !!}
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
