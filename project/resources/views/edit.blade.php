@extends('layouts.index')

@section('content')
<div class="container">
        <div class="card-header">Edit the item</div>
                <div class="card-body">
                    <form action="/item/update/{{$item->id}}" method="post" >
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <input type="file" name="img">
                            <label class="label">Name: </label>
                            <input type="text" name="name" class="form-control" value="{{$item->name}}" required/>
                            <input type="hidden" name='userId' value="{{ Auth::user()->id }}"/>
                        </div>
                        <div class="form-group">
                            <label class="label">Price: </label>
                            <input type="text" name="price" rows="5" cols="30" class="form-control" value="{{$item->price}}" required>
                        </div>
                        <div class="form-group">
                             <label class="label">Description: </label>
                             <input name="description" rows="5" cols="30" class="form-control" value="{{$item->description}}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection