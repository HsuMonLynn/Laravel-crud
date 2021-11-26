<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserSearchRequest;
use App\Http\Requests\UserUpdateRequest;
class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(5);
        return view('users.index',compact('users'));    
    }
    public function create()
    {
       return view('users.create');
    }
    public function store(UserStoreRequest $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        // ]);
    
        $user = User::create(
            [
                'name' => $request->name, 
                'email' => $request->email,                
                'password' => "password"
            ]); 
     
        return redirect()->route('users.index')
                        ->with('success','User created successfully.');
    }
    public function update(UserUpdateRequest $request,User $user){
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required'
        // ]);

        $user->update([
                'name' => $request->name, 
                'email' => $request->email,                
                'password' => "password"
        ]);

        return redirect()->route('users.index')
                        ->with('success','User updated suceessfully.');

    }
    public function show(User $user)
    {
        return view('users.edit',compact('user'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    public function search(UserSearchRequest $request)
    {
        $search = $request->input('search');
        $users = User::where ( 'name', 'LIKE', '%' . $search . '%' )
                ->orWhere ( 'email', 'LIKE', '%' . $search . '%' )
                ->get ();
        return view('users.index',compact('users'));
    }

    
}
