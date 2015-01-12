@extends('layout')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(['route' => ['users.update',$id], 'method' => 'PATCH']) !!}
    <!-- First Name Form Input -->
    <div class="form-group">
        {!! Form::label('firstName', 'First Name:') !!}
        {!! Form::text('firstName',$firstName, ['class' => 'form-control']) !!}
    </div>
    <!-- Last Name Form Input -->
    <div class="form-group">
        {!! Form::label('lastName', 'Last Name:') !!}
        {!! Form::text('lastName',$lastName, ['class' => 'form-control']) !!}
    </div>
    <!-- WritingName Form Input -->
    <div class="form-group">
        {!! Form::label('writingName', 'WritingName:') !!}
        {!! Form::text('writingName',$writingName, ['class' => 'form-control']) !!}
    </div>
    <!-- Email Primary Form Input -->
    <div class="form-group">
        {!! Form::label('email', 'Email (Primary):') !!}
        {!! Form::text('email',$email, ['class' => 'form-control']) !!}
    </div>
    <!-- Email2 Form Input -->
    <div class="form-group">
        {!! Form::label('email2', 'Email (Secondary):') !!}
        {!! Form::text('email2',$email2, ['class' => 'form-control']) !!}
    </div>
    <!-- Daytime Phone Form Input -->
    <div class="form-group">
        {!! Form::label('phone1', 'Daytime Phone:') !!}
        {!! Form::text('phone1',$phone1, ['class' => 'form-control']) !!}
    </div>
    <!-- Evening Phone Form Input -->
    <div class="form-group">
        {!! Form::label('phone2', 'Evening Phone:') !!}
        {!! Form::text('phone2',$phone2, ['class' => 'form-control']) !!}
    </div>
    <!-- Alternate Phone Form Input -->
    <div class="form-group">
        {!! Form::label('phone3', 'Alternate Phone:') !!}
        {!! Form::text('phone3',$phone3, ['class' => 'form-control']) !!}
    </div>
    <!-- Street Form Input -->
    <div class="form-group">
        {!! Form::label('street', 'Street:') !!}
        {!! Form::text('street',$street, ['class' => 'form-control']) !!}
    </div>
    <!-- City Form Input -->
    <div class="form-group">
        {!! Form::label('city', 'City:') !!}
        {!! Form::text('city',$city, ['class' => 'form-control']) !!}
    </div>
    <!-- State Form Input -->
    <div class="form-group">
        {!! Form::label('state', 'State:') !!}
        {!! Form::text('state',$state, ['class' => 'form-control']) !!}
    </div>
    <!-- Zip Form Input -->
    <div class="form-group">
        {!! Form::label('zipCode', 'Zip:') !!}
        {!! Form::text('zipCode',$zipCode, ['class' => 'form-control']) !!}
    </div>
    <!-- Country Form Input -->
    <div class="form-group">
        {!! Form::label('country', 'Country:') !!}
        {!! Form::text('country',$country, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Submit!') !!}
    {!! Form::close() !!}
@stop
