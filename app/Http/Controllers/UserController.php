<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //Show register/create form
    public function create() {
        return view("users.register");
    }

    //Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'username'=>["required", "min:3"],
            'email'=>["required", "email", Rule::unique('users', 'email')],
            'password'=>"required|confirmed|min:6"
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields["password"]);

        //Create User
        $user = User::create($formFields);
        
        //Login
        auth()->login($user);

        return redirect('/');
    }

    //Logout
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect("/");
    }


    //show login form
    public function login() {
        return view("users.login");
    }


    //authenticate user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'username'=>['required', 'string', 'max:255', 'unique:users'],
            'password'=>"required"
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect("/");
        }
        
        return Redirect::back()->withErrors(["username"=>"Invalid Credentials"]);
    }
}
