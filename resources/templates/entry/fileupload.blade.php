<!-- Upload File Form Input -->
<div class="panel callout radius form-group">
    <p>Your entry file must be in the rtf format and you must remove all of your personal information (author name) before submitting</p>
    {!! Form::label('filename', 'Upload File:') !!}
    {!! Form::file('filename', ['class' => 'form-control','accept'=>'.rtf']) !!}
</div>