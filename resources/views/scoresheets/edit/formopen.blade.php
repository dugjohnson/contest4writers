{!! Html::script('js/scoresheet.js') !!}

{!! Form::hidden('entry_id',$scoresheet->entry_id) !!}
{!! Form::hidden('category',$scoresheet->category) !!}
{!! Form::hidden('finalScore',$scoresheet->finalScore) !!}
{!! Form::hidden('published',$scoresheet->published,array('id'=>'published')) !!}
{!! Form::hidden('id',$scoresheet->id) !!}