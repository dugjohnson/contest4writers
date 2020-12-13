<p>Internal Comments or Notes: </p>
<!-- Comments Form Input -->
<div class="form-group">
{!! Form::label('internalComments', 'Comments or Notes:') !!}
{!! Form::textarea('internalComments',$judge->internalComments, ['class' => 'form-control']) !!}
</div>