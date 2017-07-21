<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function getDashboard(){
        return view('dashboard');
    }
    //post controller for signup
    public function postSignup(Request $request)
    {
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
    //controller to save account
    public function postSaveAccount(Request $request)
    {
        $this->validate($request, [
           'first_name' => 'required|max:120' 
        ]);
        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'] . '-' . $user->id . '.jpg';
        if($file){
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('account');
    }
    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}
