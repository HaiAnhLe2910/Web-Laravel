<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Item;
class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->content = $request->get('comment_content');
        $comment->user()->associate($request->user());
        $item = Item::find($request->get('item_id'));
        $item->comments()->save($comment);

        return back();
    }
    public function delete($id){
        $comment = Comment::Find($id);
        if (auth()->user()->is($comment->user)) {
            $comment->delete();
        }
    
        return back();
    }
}
