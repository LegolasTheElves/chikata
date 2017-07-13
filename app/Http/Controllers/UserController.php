<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //post controller for signup
    public function postSignup(Request $request){
        //getting the input field in the form
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);
        //create new user variable using User class
        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;
        
        $user->save();
        return redirect()->back();
    }
    //post controller for singin
    public function postSignin(){
        
    }
}