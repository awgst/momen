<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authentication(Request $request){
        $credential = $request->validate([
            'email' => 'email:rfc,dns|required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)){
            // If user successfully login
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return response()->json(['message'=>'Error']);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }

}
