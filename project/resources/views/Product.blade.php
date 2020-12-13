@extends('layouts.index')

@section('style')
   <link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection

@section('content')
   <h3 class="h3">Products </h3>
   @if(count($items)>0)
      @foreach ($items as $item)
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" alt="Card image cap" src="storage/imgs/{{$item->img}}">
         <div class="card-body">
           <h5 class="card-title"><a href="/item/{{$item->id}}">{{$item->name}}</a></h5>
           <p class="card-text">Price: {{$item->price}}</p>
           <a href="#" class="btn btn-primary">Add to bag</a>
         </div>   
       </div>
      @endforeach
    @else
       <p> No items found! </p>
    @endif
@endsection
