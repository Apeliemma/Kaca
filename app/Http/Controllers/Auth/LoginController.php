<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $username = $request->username;
        $password = $request->password;

        $usernameExists = User::where('username', $username)->first();
        if (!$usernameExists) {
            return back()->withErrors([
                'username' => 'Your provided credentials do not match in our records.',
            ]);
        }

        // for user whom we have stored his new password in the system
        if ($usernameExists->password_updated_at) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('dashboard')
                    ->withSuccess('You have successfully logged in!');
            }
        }

        // Migrated user who logs in for the first time
        //TODO check password hash if matches old system
        if (decryptProperty($usernameExists->old_password) == $password) {
            // set successsful new users  login
            $usernameExists->password = bcrypt($password);
            $usernameExists->password_updated_at = 1;
            $usernameExists->save();
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('dashboard')
                    ->withSuccess('You have successfully logged in!');
            }
        }

        return back()->withErrors([
            'username' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }


    public function username()
    {
        return 'username';
    }
}
