<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function signIn()
    {
        if (!Session::get('username')) {
            return view('auth.login');
        }
        return redirect(route('homepage'));
    }

    function signUp()
    {
        if (!Session::get('username')) {
            return view('auth.signup');
        }
        return redirect(route('homepage'));
    }

    function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:user|max:25|regex:/^\S*$/',
            'password' => 'required|min:8|regex:/\d/',
        ]);

        if ($validator->fails()) {
            Session::flash('status');

            return redirect()->back();
        }

        $password = $request->password;
        $repeatPassword = $request->repeat_password;

        if ($password != $repeatPassword) {
            Session::flash('status');
            return redirect()->back();
        }

        $user = User::create([
            'username' => $request->username,
            'password' => $request->password
        ]);

        $user->save();

        Session::put('username', $request->username);

        return redirect(route('homepage'));
    }

    function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if ($user == null || $user->password != $request->password) {
            return redirect(route('sign-in'));
        }

        Session::put('username', $request->username);
        return redirect(route('homepage'));
    }

    function logout()
    {
        Session::flush();
        return redirect(route('sign-in'));
    }
}
