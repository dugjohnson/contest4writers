@foreach([
    ['legend' => 'OPENING', 'scores' => ['01', '02']],
    ['legend' => 'STORY', 'scores' => ['03', '04', '05', '06']],
    ['legend' => 'CHARACTERIZATION', 'scores' => ['07', '08', '09']],
    ['legend' => 'SETTING', 'scores' => ['10', '11', '12']],
    ['legend' => 'STYLE/VOICE', 'scores' => ['13', '14', '15']],
    ['legend' => 'DIALOGUE/NARRATIVE', 'scores' => ['16', '17']]
] as $section)
<flux:fieldset class="mt-8">
    <flux:legend>{{ $section['legend'] }}</flux:legend>

    @foreach($section['scores'] as $num)
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
@endforeach
