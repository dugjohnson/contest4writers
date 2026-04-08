<script src="/js/scoresheet.js"></script>

<input type="hidden" name="entry_id" value="{{ $scoresheet->entry_id }}">
<input type="hidden" name="category" value="{{ $scoresheet->category }}">
<input type="hidden" name="finalScore" value="{{ $scoresheet->finalScore }}">
<input type="hidden" id="published" name="published" value="{{ $scoresheet->published }}">
<input type="hidden" name="id" value="{{ $scoresheet->id }}">

{{--<p class="text-red-500 mb-4">--}}
{{--    Are there any concerns regarding category or content for this entry? Any concerns to share with the contest committee? Please let us know if this book is entered in the wrong--}}
{{--    category, contains language or situations that are culturally or racially offensive, or is otherwise--}}
{{--    problematic.--}}
{{--</p>--}}

{{--<flux:field>--}}
{{--    <flux:label>Comments (not required to have a response):</flux:label>--}}
{{--    <flux:textarea name="comment25">{{ $scoresheet->sheet->comments->comment25 }}</flux:textarea>--}}
{{--</flux:field>--}}
