@if ($canDelete)
    {!! Form::open(['url' => 'judges/'.$judge->id, 'method' => 'delete', 'id'=>'deleteform']) !!}
    <input id="deleteOK" type="checkbox">  OK to delete<br>
    <p>You cannot undo this action!</p>
    <button id="deleteButton" class="!bg-red-600" type="button">Delete this judge</button>
    {!! Form::close() !!}

    <script type="application/javascript">
        document.getElementById('deleteOK').onclick = checkSubmit;
        document.getElementById('deleteButton').onclick = submitForm;
        checkSubmit();

        function checkSubmit() {
            var isChecked = document.getElementById('deleteOK').checked
            document.getElementById('deleteButton').disabled = !isChecked;
            var isDisabled = document.getElementById('deleteButton').disabled;
        }

        function submitForm() {
            document.getElementById('deleteform').submit();
        }

    </script>
@endif
