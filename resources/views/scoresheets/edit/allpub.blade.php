@extends('scoresheets.layout')

@section('content')
    <div id="view-content" class="space-y-8">
        <flux:fieldset>
            <flux:legend>SCORING (100 points max)</flux:legend>
            <ul class="list-disc ml-6 space-y-1">
                <li>5 = excellent</li>
                <li>4 = good</li>
                <li>3 = average</li>
                <li>2 = fair</li>
                <li>1 = poor</li>
            </ul>
            <p class="mt-4 text-sm text-gray-600 italic">Important: Professional, constructive feedback is required for
                all elements regardless of score.</p>
        </flux:fieldset>

        <form action="{{ url('scoresheets/'.$scoresheet->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('scoresheets.edit.formopen')
            @include('scoresheets.edit.allscoresheets')

            <flux:fieldset>
                <flux:legend>ENDING</flux:legend>

                @foreach(['18', '19', '20'] as $num)
                    <flux:field class="mt-4">
                        <flux:label>{{ $label['score'.$num] }}</flux:label>
                        <div class="flex flex-row gap-4 mt-2">
                            @foreach([1,2,3,4,5] as $val)
                                <label class="flex items-center gap-2 cursor-pointer scorer-label">
                                    <input type="radio"
                                           name="score{{ $num }}[]"
                                           value="{{ $val }}"
                                           class="scorer form-radio"
                                        {{ $scoresheet->sheet->scores->{'score'.$num} == $val ? 'checked' : '' }}>
                                    <span class="text-sm">{{ $val }}</span>
                                </label>
                            @endforeach
                        </div>
                    </flux:field>
                @endforeach

                <flux:field class="mt-4">
                    <flux:label>Comments:</flux:label>
                    <flux:textarea name="comment20">{{ $scoresheet->sheet->comments->comment20 }}</flux:textarea>
                </flux:field>
            </flux:fieldset>

            @include('scoresheets.edit.bonus')
            @include('scoresheets.edit.formclose')
        </form>
    </div>
@stop
