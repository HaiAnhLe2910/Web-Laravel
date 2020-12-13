@extends('layouts.index')

@section('content')
   <h1>Item</h1>
         <img style="width:250px;height:250px" src="/storage/imgs/{{$item->img}}">
         <h3>{{$item->name}}</h3>
         <small>Price: {{$item->price}}</small> 
         <small>{{$item->description}} </small>

    
    

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    
                    <h4>Display Comments</h4>
                    @foreach($item->comments as $comment)
                        <div class="display-comment">
                            <strong>{{ $comment->user->name }}</strong>
                            <p>{{ $comment->content }}</p>

                           <form action="{{ route('comment.delete', ['id' => $comment->id]) }}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <div class="form-group">
                                 @if (Auth::check())
                                    @if(count((array) $item->comments) > 0)
                                       @if($comment->user->id == Auth::user()->id)
                                          <button type="submit" class="btn btn-danger">DELETE</button>
                                       @endif
                                    @endif
                                 @endif
                              </div>
                           </form>
                        </div>
                    @endforeach
                    <hr />
                    @if(Route::has('login'))
                    @auth
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_content" class="form-control" />
                            <input type="hidden" name="item_id" value="{{ $item->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
                    </form>
                    
                    @else
                    <p>Please <a href="{{route('login')}}">log in </a> to comment!</p>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
      
    
@endsection