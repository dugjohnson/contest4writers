@extends('scoresheets.layout')


@section('content')
    <div id="view-content" class="space-y-8">
        @include('scoresheets.edit.openunpub')

        <form action="{{ url('scoresheets/'.$scoresheet->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('scoresheets.edit.formopen')
            @include('scoresheets.edit.allscoresheets')

            <flux:fieldset>
                <flux:legend>CATEGORY SPECIFIC QUESTIONS - {{ $label['UnpubExtra'] }} ROMANTIC SUSPENSE</flux:legend>

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
                    <flux:field class="mt-4">
                        <flux:label>Comments:</flux:label>
                        <flux:textarea name="comment{{ $num }}">{{ $scoresheet->sheet->comments->{'comment'.$num} }}</flux:textarea>
                    </flux:field>
                @endforeach
            </flux:fieldset>

            @include('scoresheets.edit.bonus')
            @include('scoresheets.edit.formclose')
        </form>
    </div>
@stop
