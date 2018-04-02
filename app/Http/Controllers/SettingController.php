<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function getProfile()
    {
    	$user = Auth::user();

    	return view('settings.profile', compact('user'));
    }

    public function postProfile(Request $request)
    {
    	$user = Auth::user();

    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email'
    	]);

    	$user->fill($request->all())->save();

    	flash('Profil telah berjaya dikemaskini')->success();

    	return back();
    }
}
