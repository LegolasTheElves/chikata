<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getDashboard(){
        return view('dashboard');
    }
    //post controller for signup
    public function postSignup(Request $request){
        //validation user input in signup
        $this->validate($request, [
            'email' => 'required|unique:users|',
            'first_name' => 'required|max:120',
            "password" => 'required|min:6'
        ]);
        
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
        Auth::login($user);
        return redirect()->route('dashboard');
    }
    //post controller for singin
    public function postSignin(Request $request){
    //validation for user signin
    $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password'] ])){
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function getAccount(){
        return view('account', ['user' => Auth::user()]);
    }
    
}