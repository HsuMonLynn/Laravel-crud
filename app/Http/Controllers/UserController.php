<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSearchRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     */
    public function index(UserSearchRequest $request)
    {
        $users = User::when($search = request('search'), function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('id', 'LIKE', '%' . $search . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make("password"),
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make("password"),
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated suceessfully.');

    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    /**
     * Search the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function search(UserSearchRequest $request)
    // {
    //     $search = $request->search;
    //     $users = User::where('name', 'LIKE', '%' . $search . '%')
    //         ->orWhere('email', 'LIKE', '%' . $search . '%')
    //         ->orWhere('id', 'LIKE', '%' . $search . '%')
    //         ->orderBy('created_at', 'desc')->paginate(5);

    //     return view('users.index', compact('users'));
    // }

}
