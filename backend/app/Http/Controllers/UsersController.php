<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    public function user_index() 
    {
        return view("Users.login");
    }

    public function RegisterForm()
    {
        return view("Users.register");
    }

    public function checkUser(Request $request)
    {
        $user = User::where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if (!$user) {
            return redirect()
                ->route("user.index")
                ->with("msg", "email or password incorrect");
        }

        $request->session()->put('login', $user->email);
        $request->session()->put('priv', $user->role);
        $request->session()->put('cart', array());

        return redirect()->route("products.index");
    }


    public function UserStore(Request $request)
    {
        $check = User::where("email", "=", $request->input("email"))->get()->count();
        if ($check && $request->input("password") !==$request->input("conf")) {
            return view("Users.register")->with(["msg"=>"email already exist and password does not match"]);
        }
        else if ($check &&  $request->input("password")==$request->input("conf")) {
            return view("Users.register")->with(["msg"=>"email already exist"]);
        }
        else if (!$check &&  $request->input("password") !==$request->input("conf")) {
            return view("Users.register")->with(["msg"=>"password does not match"]);
        }
        else {
            $user = new User;
            $user->email = $request->input("email");
            $user->password = md5($request->input("pass"));
            $user->role = "U";
            $user->save();
            return view("Users.login");
        }
    } 

    public function UserLogOut(Request $request)
    {
        $request->session()->flush();
        return redirect()->route("user.index");
    }

}
