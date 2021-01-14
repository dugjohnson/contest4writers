<!-- Upload File Form Input -->
<div class="panel callout radius form-group">
    <p>Your entry file must be in the PDF format, no larger than 10MB</p>
    {!! Form::label('filename', 'Upload File:') !!}
    {!! Form::file('filename', ['class' => 'form-control','accept'=>'.pdf']) !!}
</div>
