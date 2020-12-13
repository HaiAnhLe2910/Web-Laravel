@extends('layouts.index')

@section('content')
<p>Welcome {{$name}}</p>
<img style="width:200px;height:200px" src="/storage/imgs/{{$img}}">
<form method="POST" action ="{{ route('user.upload') }}" enctype='multipart/form-data'>
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

<input type='file' name='img'>
<button type='submit'> Upload </button>
</form>
<form method ="POST" action ="user">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      
     <p>Your DOB: <input name='DOB' class="form-control" value="{{$DOB}}"></p>    
     <p>Your email: <input name='email' class="form-control" value="{{$email}}"> </p>
      <button type='submit' > Update </button>
</form>
@auth
<a href="/admin/{{Auth::id()}}">Manage Products</a>
<br>
<a href="{{ route('export_excel.index') }}">Manage Customers</a>
@endauth


@endsection