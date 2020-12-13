@extends('layout')

@section('content')
    @if ($errors->any())
        <ul class="error">
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(['route' => ['users.update',$user->id], 'method' => 'PATCH']) !!}
    <!-- First Name Form Input -->
    <div class="form-group">
        {!! Form::label('firstName', 'First Name:') !!}
        {!! Form::text('firstName',$user->firstName, ['class' => 'form-control']) !!}
    </div>
    <!-- Last Name Form Input -->
    <div class="form-group">
        {!! Form::label('lastName', 'Last Name:') !!}
        {!! Form::text('lastName',$user->lastName, ['class' => 'form-control']) !!}
    </div>
    <!-- WritingName Form Input -->
    <div class="form-group">
        {!! Form::label('writingName', 'WritingName:') !!}
        {!! Form::text('writingName',$user->writingName, ['class' => 'form-control']) !!}
    </div>
    <!-- Email Primary Form Input -->
    <div class="form-group">
        {!! Form::label('email', 'Email (Primary):') !!}
        {!! Form::text('email',$user->email, ['class' => 'form-control']) !!}
    </div>
    <!-- Email2 Form Input -->
    <div class="form-group">
        {!! Form::label('email2', 'Email (Secondary):') !!}
        {!! Form::text('email2',$user->email2, ['class' => 'form-control']) !!}
    </div>
    <!-- Daytime Phone Form Input -->
    <div class="form-group">
        {!! Form::label('phone1', 'Daytime Phone:') !!}
        {!! Form::text('phone1',$user->phone1, ['class' => 'form-control']) !!}
    </div>
    <!-- Evening Phone Form Input -->
    <div class="form-group">
        {!! Form::label('phone2', 'Evening Phone:') !!}
        {!! Form::text('phone2',$user->phone2, ['class' => 'form-control']) !!}
    </div>
    <!-- Alternate Phone Form Input -->
    <div class="form-group">
        {!! Form::label('phone3', 'Alternate Phone:') !!}
        {!! Form::text('phone3',$user->phone3, ['class' => 'form-control']) !!}
    </div>
    <!-- Street Form Input -->
    <div class="form-group">
        {!! Form::label('street', 'Street:') !!}
        {!! Form::text('street',$user->street, ['class' => 'form-control']) !!}
    </div>
    <!-- City Form Input -->
    <div class="form-group">
        {!! Form::label('city', 'City:') !!}
        {!! Form::text('city',$user->city, ['class' => 'form-control']) !!}
    </div>
    <!-- State Form Input -->
    <div class="form-group">
        {!! Form::label('state', 'State (2 letter code):') !!}
        {!! Form::text('state',$user->state, ['class' => 'form-control','maxlength'=>2]) !!}
    </div>
    <!-- Zip Form Input -->
    <div class="form-group">
        {!! Form::label('zipCode', 'Zip:') !!}
        {!! Form::text('zipCode',$user->zipCode, ['class' => 'form-control']) !!}
    </div>
    <!-- Country Form Input -->
    <div class="form-group">
        {!! Form::label('country', 'Country:') !!}
        {!! Form::text('country',$user->country, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Submit!',['class'=>'button radius']) !!}
    {!! Form::close() !!}
@stop

@section('sidebar')
<div class="panel radius">
    <p><strong>Why we do this</strong></p>
    <p>We ask you to fill in this information so that we can contact you easily if we need to.  If you are a finalist, we have to contact you
        before we can announce the finalists. We have actually had trouble nearly every year contacting a potential winner because the information we have is incomplete.</p>
    <p>If you are a judge, you might need assistance, or we might have information that you will need about the entries you will be judging.
        And, of course, if you are judging published we need to ship books to you.
        Sometimes we get in a tie situation and we might need an additional judge. If we rely on your great judging ability, we might need to get you quickly for a tie breaker!</p>
    <p>We appreciate you working with us to make the Daphne Competition work well for you and all our volunteers</p>
</div>
@stop
