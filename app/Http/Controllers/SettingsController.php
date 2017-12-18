<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {	
    	$settings = Setting::first();
    	return view('admin.settings.settings')->with('settings', $settings);
    }

    public function update()
    {
    	request()->validate([
    		'site_name' => 'required',
    		'address' => 'required',
    		'contact_number' => 'required',
    		'contact_email' => 'required'
    	]);

    	$setting = Setting::first();
    	$setting->site_name = request('site_name');
    	$setting->address = request('address');
    	$setting->contact_number = request('contact_number');
    	$setting->contact_email = request('contact_email');
    	$setting->save();

    	session()->flash('success', 'Successfully update site');
    	return back();
    }
}
