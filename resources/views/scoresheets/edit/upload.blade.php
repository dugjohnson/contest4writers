@extends('scoresheets.layout')

@section('content')
    <form action="{{ url('scoresheets/'.$scoresheet->id.'/upload/') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('errors')

        <flux:fieldset>
            <flux:legend>Upload File</flux:legend>
            <p class="text-sm text-gray-600 mb-4">Your comments file must be in the <strong>PDF format</strong> and you should remove all of your personal information before submitting</p>

            <flux:field>
                <flux:label>Upload File:</flux:label>
                <flux:input type="file" name="filename" accept=".pdf" />
            </flux:field>

            <div class="mt-4">
                <flux:button type="submit" id="submitButton" variant="primary">Upload Comments</flux:button>
            </div>
        </flux:fieldset>
    </form>
@stop
