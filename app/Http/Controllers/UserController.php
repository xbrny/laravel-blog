<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

    public function index()
    {
    	return view('admin.users.index')->with('users', User::all());
    }

    public function create()
    {
    	return view('admin.users.create');
    }

    public function store()
    {
    	request()->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	$user = User::create([
    		'name' => request('name'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password'))
    	]);

    	Profile::create([
    		'user_id' => $user->id,
    		'avatar' => 'avatars/default.png'
    	]);

    	session()->flash('success', 'Successfully create a new user');

    	return redirect()->route('users');
    }

    public function admin(User $user)
    {
    	$user->admin = 1;
    	$user->save();
    	session()->flash('success', 'Successfully change permision of user');
    	return back();
    }
 
    public function unadmin(User $user)
    {
    	$user->admin = 0;
    	$user->save();
    	session()->flash('success', 'Successfully change permision of user');
    	return back();
    }

    public function destroy(User $user)
    {
        if(auth()->id() == $user->id)
        {
            session()->flash('error', 'Cannot delete your own account');
            return back();
        }
        $user->profile->delete();
        $user->delete();
        session()->flash('success', 'Successfully delete user');
        return redirect()->route('users');
    }
}
