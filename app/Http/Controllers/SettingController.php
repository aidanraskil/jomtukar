<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

    public function postPicture(Request $request)
    {
        $user = Auth::user();

        if($user->getMedia('avatars')->count() > 0){
            $user->deleteMedia(Media::first()->id);
        }
        
        if (isset($request->avatar)) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        return back();
    }
}
