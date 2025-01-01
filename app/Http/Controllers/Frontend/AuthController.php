<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }

    public function showResetPasswordForm()
    {
        return view('frontend.auth.reset_password');
    }

    public function showChangePasswordForm()
    {
        return view('frontend.auth.change_password');
    }
}
