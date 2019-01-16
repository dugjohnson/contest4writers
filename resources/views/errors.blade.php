@if(session()->has('message'))
    <div class="alert panel">
        {{ session()->get('message') }}
    </div>
@endif
@if ($errors->any())
    <ul class="error">
        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
@endif
