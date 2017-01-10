@extends('layout')

@section('content')
    <p>This action can create score sheets for one entry</p>
    <p>If you do not want to do that, click at the top of the page to go back</p>
    {!! Form::open(array('url' => 'scoresheets/extra','method'=>'post'))  !!}
<div class="form-group">
    {!! Form::label('totalWhenDone', 'Total Score sheets for entry when finished (adds blank entries, does not delete existing):') !!}
    {!! Form::text('totalWhenDone',0, ['class' => 'form-control','size'=>2,'maxlength'=>2]) !!}
</div>
<div class="form-group">
    {!! Form::label('entry', 'Entry number:') !!}
    {!! Form::text('entry','', ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create Extras', ['class' => 'form-control']) !!}
    {!! Form::close() !!}
@stop
