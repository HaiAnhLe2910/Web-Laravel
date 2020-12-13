@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create an item</div>
                <div class="card-body">
                    <form method="post" action="{{ route('item.store') }}" enctype='multipart/form-data'>
                        <div class="form-group">
                            @csrf
                            <input type="file" name="img">
                            <label class="label">Name: </label>
                            <input type="text" name="name" class="form-control" required/>
                            <input type="hidden" name='userId' value="{{ Auth::user()->id }}"/>
                        </div>
                        <div class="form-group">
                            <label class="label">Price: </label>
                            <textarea name="price" rows="5" cols="30" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                             <label class="label">Description: </label>
                             <textarea name="description" rows="5" cols="30" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="class-header">Item list</div>
            <div class="body">
                @foreach ($items as $item)
                <div class="product">
         <img style="width:250px;height:250px" src="/storage/imgs/{{$item->img}}">
         <h3><a href="/item/{{$item->id}}">{{$item->name}}</a></h3>
         <small>Price: {{$item->price}}</small> 
         <form action="{{ route('item.delete', ['id' => $item->id]) }}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <div class="form-group">
                                 @if (Auth::check())
                                    
                                       @if($item->admin_id == Auth::user()->id)
                                       <button type="submit" class="btn btn-danger">Delete</button>
                                       @endif
                                    
                                 @endif
                              </div>
         </form>
         <a href="/item/edit/{{$item->id}}" class="btn btn-default">Edit </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>  
   
  
@endsection
