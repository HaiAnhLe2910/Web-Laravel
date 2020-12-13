<?php
namespace App\Http\Controllers;

use App\User;
use DB;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function index()
    {
        $user = User::all();
        return UserResource::collection($user);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->DOB = $request->input('DOB');
        $user->password = Hash::make($request->input('password'));
        $user->save();

       return $user;

        //$userResourse = new UserResource($user);
        //return $userResourse->first();
    }

    public function show($id)
    {
        $user = User::find($id);; //id comes from route
        if( $user ){

            return new UserResource($user);

        }
        return "User Not found"; // temporary error
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user != null)
        {
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->DOB = $request->input('DOB');
        $user->save();

        return $user;
        }
        else
        {
            return response()->json([
                'messege' => 'There is no user with ID:' . $id
            ],404);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user != null)
        {
            if($user->delete()){
                //return  new UserResource($emp);
                return response()->json([
                    'messege' => 'The user is deleted!'
                ]);
            }
            return response()->json([
                'messege' => 'There was a problem deleting the user!'
            ]);
        }
        else
        {
            return response()->json([
                'messege' => 'There is no user with ID:' . $id
            ],404);
        }

    }




 

}
?>