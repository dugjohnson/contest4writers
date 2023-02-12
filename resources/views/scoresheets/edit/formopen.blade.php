<script src="/js/scoresheet.js"></script>

{!! Form::hidden('entry_id',$scoresheet->entry_id) !!}
{!! Form::hidden('category',$scoresheet->category) !!}
{!! Form::hidden('finalScore',$scoresheet->finalScore) !!}
{!! Form::hidden('published',$scoresheet->published,array('id'=>'published')) !!}
{!! Form::hidden('id',$scoresheet->id) !!}
<p>Any concerns to share with the contest committee? Please let us know if this book is entered in the wrong
    category, contains language or situations that are culturally or racially offensive, or is otherwise
    problematic.</p>
<div class="form-group">
    {!! Form::label('comment01', 'Comments (not required to a have a response):') !!}
    {!! Form::textarea('comment01',$scoresheet->sheet->comments->comment01, ['class' => 'form-control']) !!}
</div>
