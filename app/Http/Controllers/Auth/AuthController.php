<?php

namespace App\Http\Controllers\Auth;

use App\Dtos\User\UserDto;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EndUser\Auth\LoginRequest;
use App\Http\Requests\EndUser\Auth\RegisterRequest;

class AuthController extends Controller
{
    // ---------------  \\
    public function __construct(
        private readonly AuthService $authService
    ) {
    }
    // ---------------  \\
    public function registerView()
    {
        return view('enduser.pages.auth.register');
    }
    public function register(RegisterRequest $request)
    {
        // ---------------  \\
        $user = $this->authService->register(UserDto::fromRegisterRequest($request));
        // ---------------  \\
        Auth::login($user);
        // ---------------  \\
        return redirect()->intended(route('home'));
    }

    public function loginView()
    {
        return view('enduser.pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        // ---------------  \\
        $attempt = $this->authService->login(
            email: $request->validated('email'),
            password: $request->validated('password')
        );
        // ---------------  \\
        if ($attempt) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }
        // ---------------  \\
        return back()->withErrors([
            'email' => trans('auth.failed')
        ])->withInput();
    }

    public function logout(Request $request)
    {
        // ---------------  \\
        Auth::logout();
        // ---------------  \\
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // ---------------  \\
        return to_route('home');
    }
}

