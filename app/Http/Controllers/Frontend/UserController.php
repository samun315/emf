<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserProfile()
    {
        return view('frontend.user.profile');
    }

    public function showUserWishlist()
    {
        return view('frontend.user.wishlist');
    }
}
