<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function login(){
        return view('pages.auth.login');
    }

    public function register(){
        return view('pages.auth.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'dob' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone'=> ['required'],
            'role'=> ['required'],
            'password' => ['required', 'min:6']
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        info($formFields);
        Log::info('Request data:', $request->all());
        $user = User::create($formFields);
        $user->save();
        auth()->login($user);
        return redirect('/')->with('message', 'Registration successful!');
    }


    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
    
        // Retrieve the user instance directly from the database
        $user = User::where('email', $formFields['email'])->first();
    
        // Check if the user exists and the password is correct
        if ($user && Hash::check($formFields['password'], $user->password)) {
            $user->save();
             // Log the user in
             auth()->login($user);
        
             // Clear the email from the session
             $request->session()->forget('email');
     
             return redirect('/')->with('message', 'You are now logged in!');

        } else {
            return redirect('/login')->with('error', 'Wrong credentials!!');
        }
    }
}
