<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SendUserResetLinkRequest;
use App\Http\Requests\UserResetPasswordRequest;
use App\Models\User;
use App\Mail\UserSendResetLinkMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class PasswordResetController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create()
    {
        return view('web.frontend.forgot-password');
    }


    public function sendResetLink(SendUserResetLinkRequest $request)
    {
        $token = Str::random(64);

        $user = User::where('email', $request->email)->first();
        $user->remember_token = $token;
        $user->save();

        Mail::to($request->email)->send(new UserSendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', 'A mail has been sent to your email.');

    }


    public function resetPassword($token)
    {
        // Retrieve the email from the query string in the browser
        $email = request('email');

        return view('web.frontend.reset-password', compact('email', 'token'));
    }


    public function handleResetPassword(UserResetPasswordRequest $request)
    {
        $user = User::where(['email' => $request->email, 'remember_token' => $request->token])->first();

        if(!$user){
            return back()->with('error', 'Invalid token');
        }

        $user->password = bcrypt($request->password);
        $user->remember_token = null;
        $user->save();

        return redirect()->route('login.index')->with('success', 'Password reset successful. Try login now.');
    }
}

