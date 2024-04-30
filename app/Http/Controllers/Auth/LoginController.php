<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function show()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('Auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        // dd(Auth::attempt($credentials));
        if (!Auth::validate($credentials)) {
            return redirect()->to('/')->withErrors('incorrect credentials');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    public function authenticated($request, $user)
    {
        return redirect('/home');
    }
}
