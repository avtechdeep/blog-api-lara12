<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Symfony\Component\String\b;

class UserAuthController extends Controller
{
    //

    function login(Request $request){
        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return ['result'=>"User Creditial Not Match", "Success"=>false];
        }
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $user['name']=$user->name;
        return ['success'=>true, "result"=>$success, "msg"=>"User Login Successfully"];
        return $request->all();

        //return view('user.login');
    }
    function singup(Request $request){
        // return "Signup Function";
        $input =$request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $user['name']=$user->name;
        return ['success'=>true, "result"=>$success, "msg"=>"User Register Successfully"];

    }
}
