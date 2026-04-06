@foreach([
    ['legend' => 'OPENING', 'scores' => ['01', '02'], 'comment' => '02'],
    ['legend' => 'STORY', 'scores' => ['03', '04', '05', '06'], 'comment' => '06'],
    ['legend' => 'CHARACTERIZATION', 'scores' => ['07', '08', '09'], 'comment' => '09'],
    ['legend' => 'SETTING', 'scores' => ['10', '11', '12'], 'comment' => '12'],
    ['legend' => 'STYLE/VOICE', 'scores' => ['13', '14', '15'], 'comment' => '15'],
    ['legend' => 'DIALOGUE/NARRATIVE', 'scores' => ['16', '17'], 'comment' => '17']
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
    @endforeach

    @if(isset($section['comment']))
    <flux:field class="mt-4">
        <flux:label>Comments:</flux:label>
        <flux:textarea name="comment{{ $section['comment'] }}">{{ $scoresheet->sheet->comments->{'comment'.$section['comment']} }}</flux:textarea>
    </flux:field>
    @endif
</flux:fieldset>
@endforeach
