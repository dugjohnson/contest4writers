<fieldset>
    <legend>SCORING (100 points max)</legend>
    <ul>
        <li>5 = excellent</li>
        <li>4 = good</li>
        <li>3 = average</li>
        <li>2 = fair</li>
        <li>1 = poor</li>
    </ul>
    @if(! ($email ?? false))
        <p class="text-red-500">Are there any concerns regarding category or content for this entry?
            Any concerns to share with the contest committee? Please let us know if this book is entered in the wrong
            category, contains language or situations that are culturally or racially offensive, or is otherwise
            problematic.</p>
        <p><span class="text-red-500">Comments (leave blank if no issues)</span>: {{ $scoresheet->sheet->comments->comment01 }} </p>
    @endif

</fieldset>
@if(! ($email ?? false))
    <div>
        <a href="/scoresheets" class="button small radius">Return to Scoresheets</a>

    </div>
@endif
