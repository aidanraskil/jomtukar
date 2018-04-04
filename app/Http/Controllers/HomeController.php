<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->profiles->count() > 0) {
        	$best_profiles = Profile::where('user_id' , '!=', $user->id)
        	->where('position' , '=', $user->profiles->first()->position)
        	->where('state_from', $user->profiles->first()->state_to)
        	->where('state_to', $user->profiles->first()->state_from)
        	->get();
        	// dd($best_profiles->pluck('id'));
        	$profiles = Profile::where('user_id' , '!=', $user->id)
        	->whereNotIn('user_id', $best_profiles->pluck('id'))
        	->where('position' , '=', $user->profiles->first()->position)
        	->where('state_to', $user->profiles->first()->state_from)
        	->get();

        } else {
        	$best_profiles = Profile::where('user_id' , '==', $user->id)->get();
        	$profiles = Profile::where('user_id' , '!=', $user->id)->get();

        }



            // dd($best_profiles->pluck('id'));



        return view('home', compact('user', 'best_profiles', 'profiles'));
    }
}
