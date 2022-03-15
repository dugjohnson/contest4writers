@extends('scoresheets.layout')

@section('content')
    <!-- Upload File Form Input -->
    {!! Form::open(array('files'=>'true','url' => 'scoresheets/'.$scoresheet->id.'/upload/','method'=>'put'))  !!}
    @include('errors')

    <div class="panel callout radius form-group">
        <p>Your comments file must be in the <strong>PDF format</strong> and you should remove all of your personal information before submitting</p>
        {!! Form::label('filename', 'Upload File:') !!}
        {!! Form::file('filename', ['class' => 'form-control','accept'=>'.pdf']) !!}
    </div>
{!! Form::submit('Upload Comments', array('id'=>'submitButton','name'=>'submitButton','class'=>'button radius','onclick'=>'this.disabled = true; this.form.submit();')) !!} 
    {!! Form::close() !!}

@stop
