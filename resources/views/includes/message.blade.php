@if($errors->any())
    @foreach($errors->all() as $error)
        <p class="alert alert-danger shadow">{{$error}}</p>
    @endforeach
@endif

@if(session()->has('message'))
    <p class="alert alert-success shadow">{{session('message')}}</p>
@endif