<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserProfileUpdateRequest;
use App\Http\Requests\UserPasswordUpdateRequest;

class ProfileController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // gets specific user login information

        return view('web.backend.profile.index', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserProfileUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toast('Updated Successfully!','success')->width('400');

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage for password.
     */
    public function passwordUpdate(UserPasswordUpdateRequest $request, string $id)
    {

        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();

        toast('Updated Successfully!','success')->width('400');
        return redirect()->back();
    }
}

