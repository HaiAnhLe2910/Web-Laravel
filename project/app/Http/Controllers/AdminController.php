<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Http\Controllers\Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $items=DB::table('items')->where('admin_id',$id)->get();
        return view('admin')->with('items',$items);
    }
    public function admin()
    {
        return view('admin');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'img'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('img')){
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path = $request->file('img')->storeAs('public/imgs',$fileNameToStore);
        } 
        else 
        {
            $fileNameToStore = 'noimage.jpg';
        }

        $item =  new Item;
        $item->name = $request->get('name');
        $item->price = $request->get('price');
        $item->description=$request->get('description');
        $item->admin()->associate($request->user()); 
        $user = User::find($request->get('user_id'));
        $item->img = $fileNameToStore;
        $request->user()->item()->save($item);
        $item->save();
        return back();
    }
    public function edit($id)
    {
        $item = Item::Find($id);
        return view('edit',compact('item','id'));

    }
    public function update(Request $request,$id)
    {
        $item = Item::Find($id);
        $item->name = $request->get('name');
        $item->price = $request->get('price');
        $item->description=$request->get('description');
        $item->admin()->associate($request->user()); 
        $user = User::find($request->get('user_id'));
        $item->save();
        return view('edit')->with('item',$item);

    }
    public function delete($id)
    {
        $item = Item::Find($id);
        if (auth()->user()->is($item->admin)) {
            $item->delete();
        }
        return back();
    }


}
