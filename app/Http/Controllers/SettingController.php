<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
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

    public function getAccount()
    {
        $user = Auth::user();

        return view('settings.account', compact('user'));
    }

    public function postAccount(Request $request)
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            flash('Your current password does not matches with the password you provided. Please try again.')->error();
            return redirect()->back();
        }
 
        if(strcmp($request->get('current_password'), $request->get('password')) == 0){
            //Current password and new password are same
            flash('New Password cannot be same as your current password. Please choose a different password.')->error();
            return redirect()->back();
        }
 
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
 
        flash('Password changed successfully!')->error();

        return redirect()->back();
    }

    public function destroy()
    {
        $users = Auth::user();

        $users->delete();

        flash('Akaun telah berjaya dipadam')->success();

        return redirect()->route('welcome');
    }
}
