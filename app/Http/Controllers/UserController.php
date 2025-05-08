<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields=$request->validate([
            'name'=>['required','min:3','max:10', Rule::unique('users','name')],
            'email'=>['required', Rule::unique('users','email')],
            'password'=>'required'
        ]);

        $incomingFields["password"]=bcrypt($incomingFields['password']);
        $user=User::create($incomingFields);
        auth()->login($user);
        return redirect('/login');
        // return "hello from our controller";
    }

    public function login(Request $request){
        $incomingFields=$request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
    
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
