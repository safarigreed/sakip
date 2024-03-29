<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SigninController extends Controller
{
    


    public function form()
    {
        return view('signin.form');
    }

    public function attempt(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|exists:username,alamat_email',
            'password' => 'required',
        ]);
        $attempts = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($attempts, (bool) $request->remember)) {
            return redirect()->intended('/home');
        }
        return redirect()->back();
    }

}
