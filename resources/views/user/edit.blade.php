@extends('layout')

@section('content')
    @if ($errors->any())
        <ul class="error">
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <flux:field>
            <flux:label>First Name</flux:label>
            <flux:input type="text" name="firstName" value="{{ $user->firstName }}" />
        </flux:field>

        <flux:field>
            <flux:label>Last Name</flux:label>
            <flux:input type="text" name="lastName" value="{{ $user->lastName }}" />
        </flux:field>

        <flux:field>
            <flux:label>Writing Name</flux:label>
            <flux:input type="text" name="writingName" value="{{ $user->writingName }}" />
        </flux:field>

        <flux:field>
            <flux:label>Email (Primary)</flux:label>
            <flux:input type="email" name="email" value="{{ $user->email }}" />
        </flux:field>

        <flux:field>
            <flux:label>Email (Secondary)</flux:label>
            <flux:input type="email" name="email2" value="{{ $user->email2 }}" />
        </flux:field>

        <flux:field>
            <flux:label>Daytime Phone</flux:label>
            <flux:input type="text" name="phone1" value="{{ $user->phone1 }}" />
        </flux:field>

        <flux:field>
            <flux:label>Evening Phone</flux:label>
            <flux:input type="text" name="phone2" value="{{ $user->phone2 }}" />
        </flux:field>

        <flux:field>
            <flux:label>Alternate Phone</flux:label>
            <flux:input type="text" name="phone3" value="{{ $user->phone3 }}" />
        </flux:field>

        <flux:field>
            <flux:label>Street</flux:label>
            <flux:input type="text" name="street" value="{{ $user->street }}" />
        </flux:field>

        <flux:field>
            <flux:label>City</flux:label>
            <flux:input type="text" name="city" value="{{ $user->city }}" />
        </flux:field>

        <flux:field>
            <flux:label>State (2 letter code)</flux:label>
            <flux:input type="text" name="state" value="{{ $user->state }}" maxlength="2" />
        </flux:field>

        <flux:field>
            <flux:label>Zip</flux:label>
            <flux:input type="text" name="zipCode" value="{{ $user->zipCode }}" />
        </flux:field>

        <flux:field>
            <flux:label>Country</flux:label>
            <flux:input type="text" name="country" value="{{ $user->country }}" />
        </flux:field>

        <flux:button class="button-radius" type="submit" variant="primary">Submit!</flux:button>
    </form>
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
