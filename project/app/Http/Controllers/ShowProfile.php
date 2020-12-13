<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;


class ShowProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
    public function show()
    {   
        $data = [
            'img' => Auth::user()->img,
            'id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'DOB'=>Auth::user()->DOB,
        ];
        
        return view('profile')->with($data);
    }

    public function update(Request $request)
    {
        $user = App\User::find(Auth::user()->id); 
        $input=$request->only('DOB');
        $user->DOB = $input['DOB'];
        $user->save();
        echo 'success';
        //echo '<a href="/"> Return to home page </a>';
        return redirect('/');
    }

    public function upload(Request $request)
    {
        $user = App\User::find(Auth::user()->id); 

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

        $user->img = $fileNameToStore;

        $user->save();
        return back();
    }
    
}
