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

        $best_profiles = Profile::all();

            // dd($best_profiles->pluck('id'));

        $profiles = Profile::all();

        return view('home', compact('user', 'best_profiles', 'profiles'));
    }
}
