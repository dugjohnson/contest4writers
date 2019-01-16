@if(session()->has('message'))
    <div class="alert panel">
        {{ session()->get('message') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert panel">
        <ul class="error">
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
