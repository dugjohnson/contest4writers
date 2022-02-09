<!-- Upload File Form Input -->
<div class="panel callout radius form-group">
    <p>Your entry file must be in the <strong>PDF format</strong> and you must remove all of your personal information (author name) before submitting</p>
    {!! Form::label('filename', 'Upload File:') !!}
    {!! Form::file('filename', ['class' => 'form-control','accept'=>'.pdf']) !!}
</div>
