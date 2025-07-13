<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //signup (GET), signup(POST), login(GET), login(POST), logout(Post)

    // GET: /signup
    public function showSignupForm()
    {
        return view('auth.signup', ["pageTitle" => "Sign up - Page"]);
    }

    // POST: /signup
    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");

        $user->save();

        auth()->login($user);

        return redirect("/");
    }

    // GET: /login
    public function showLoginForm()
    {
        return view('auth.login', ["pageTitle" => "Sign in - Page"]);
    }

    // POST: /login
    public function login(LoginRequest $request)
    {
        $credentials = $request->only("email", "password");

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect("/");
        }

        return back()->withErrors(["email" => "The provided credentials do not match our records.",])->withInput();

    }

    // POST: /logout
    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
