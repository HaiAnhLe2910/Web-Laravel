<?php
namespace App\Http\Controllers;

use App\Item;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\View;
class ItemController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function index()
    {
        $items=Item::all();
        return view('Product')->with('items',$items);
    }


    public function show($id)
    {
        $item = Item::find($id);
        return view('item', compact('item'));
    }
}