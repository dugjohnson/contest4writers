<fieldset>
    <legend>SCORING (100 points max)</legend>
    <ul>
        <li>5 = excellent</li>
        <li>4 = good</li>
        <li>3 = average</li>
        <li>2 = fair</li>
        <li>1 = poor</li>
    </ul>
    @if(! (isset($email) || $email))
        <p>Any concerns to share with the contest committee? Please let us know if this book is entered in the wrong
            category, contains language or situations that are culturally or racially offensive, or is otherwise
            problematic.</p>
        <p>Comments (not required to a have a response): {{ $scoresheet->sheet->comments->comment01 }} </p>
    @endif

</fieldset>
<div>
    <a href="/scoresheets" class="button small radius">Return to Scoresheets</a>

</div>
