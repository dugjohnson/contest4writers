{!! Form::hidden('isCoordinator',$isCoordinator) !!}

<!-- Category Form Input -->
<div class="form-group">
    {!! Form::label('received', 'Entry is Complete:') !!}
    {!! Form::select('received', ['0'=>'No','1'=>'Yes'], $entry->received , ['class' => 'form-control']) !!}
</div>
<!-- Category Form Input -->
<div class="form-group">
    {!! Form::label('finalist', 'Entry is Finalist:') !!}
    {!! Form::select('finalist',  ['0'=>'No','1'=>'Yes'], $entry->finalist , ['class' => 'form-control']) !!}
</div>