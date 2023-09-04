<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function index()
    {
        return view('dashboard.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('login', 'password');

        try {
            if (Auth::guard('web')->attempt(['email' => $credentials['login'], 'password' => $credentials['password']])) {
                return redirect()->intended('/');
            }

            if (Auth::guard('web')->attempt(['username' => $credentials['login'], 'password' => $credentials['password']])) {
                return redirect()->intended('/');
            }

            return redirect()->back();
        } catch (\Exception $e) {
        }
    }

    public function register()
    {
        return view('dashboard.auth.register');
    }

    public function create(RegisterRequest $request)
    {
        try {

            if (!User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ])) {
                return redirect()->back();
            }

            return redirect()->route('login');
        } catch (\Exception $e) {
        }
    }
}
