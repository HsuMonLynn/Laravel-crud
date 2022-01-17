<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('profile.index', compact('user'));
    }

    public function edit($id)
    {
        $user = User::with('profile')->findOrFail(Auth::user()->id);

        return view('profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request, $id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->update();

        $profile = Profile::findOrFail($user->profile->id);
        if ($request->file('photo')) {
            Storage::delete('/public/user-photos/' . $profile->image);
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $request->file('photo')->storeAs('public/user-photos', $photoName);
            $profile->image = $photoName;
        }
        $profile->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'User Profile updated suceessfully.');
    }

}
