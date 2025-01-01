<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordChangeRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PasswordChangeController extends Controller
{
    public function showPasswordChangeForm()
    {
        return view('admin.user.passwordChangeForm');
    }

    public function updateUserPassword(PasswordChangeRequest $request)
    {
        $user_email = session('logged_session_data.email');

        try {

            $user =  Admin::where('email', $user_email)->first();

            if (Hash::check($request->old_password, $user->password)) {

                Admin::where('email', $user_email)->update(['password' => Hash::make($request->new_password)]);

                Session::flush();
                return redirect(url('/'))->with('success', 'Password was changed successfully!');
            } else {
                return back()->with('error', 'The old password you provided does not match our records');
            }
        } catch (\Throwable $th) {
            dd($th);
            return back()->with('error', $th->getMessage());
        }
    }
}
