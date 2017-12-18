<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
    	return view('admin.profile.show')->with('user', auth()->user());
    }

    public function update()
    {
    	$this->validator(request()->all())->validate();
    	$user = auth()->user();
    	$user->name = request('name');
    	$user->email = request('email');
    	if(request()->filled('password'))
    	{
    		$user->password = bcrypt(request('password'));
    	}
		if(request()->hasFile('avatar'))
    	{
			$avatar = request('avatar');
			$avatar_new_name = time() . $avatar->getClientOriginalName();
			$path = $avatar->move('avatars', $avatar_new_name);
			$user->profile->avatar = $path;
		}
    	$user->profile->about = request('about');
    	$user->profile->facebook = request('facebook');
    	$user->profile->youtube = request('youtube');
    	$user->save();
    	$user->profile->save();

    	session()->flash('success', 'Successfully update your profile');

    	return redirect()->route('users');
    }

    public function validator(array $arr)
    {
    	$rule = [
    		'name' => 'required',
    		'email' => 'required|email',
    		'facebook' => 'url',
    		'youtube' => 'url'
    	];

    	if(request()->filled('password'))
    	{
			$rule['password'] ='required|min:6';
		}

    	return validator($arr, $rule);
    }
}
