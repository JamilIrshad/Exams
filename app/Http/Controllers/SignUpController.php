<?php

namespace App\Http\Controllers;

use App\Models\User; // Add this line to import the User class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Add this line to import the Validator class
use Illuminate\Support\Facades\Validator; // Add this line to import the Hash class

class SignUpController extends Controller
{
    public function showSignUpForm()
    {
        return view('authentication/Register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // dd($request->all());

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //After saving redirect to display of all categories
        return redirect()->route('login')->with('success', 'User created successfully.Login now!');

    }
}
