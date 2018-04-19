<?php

namespace App\Http\Controllers;

use Auth;
use App\User;   
use App\State;
use App\Profile;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$states = State::select('id', 'name')->get();

    	$q = Profile::query();

        if(Input::has('jawatan'))
        {
        	$q->where('position','like','%'.Input::get('jawatan').'%');
        }

        if(Input::has('state_from'))
        {
        	$q->where('state_from', Input::get('state_from'));
        }

        if(Input::has('state_to'))
        {
        	$q->where('state_to', Input::get('state_to'));
        }

    	$profiles = $q->latest()->paginate(20);

        return view('profile.index', compact('profiles', 'states') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$states = State::all();

        return view('profil.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'position'  =>  'required',
            'grade' =>  'required',
            // 'office'    =>  'required',
            'state_from'    =>  'required',
            'district_from' =>  'required',
            'state_to'  => 'required',
        ]);

        $user = Auth::user();

        $user->profiles()->create($request->all());

        flash('Profil pertukaran anda telah berjaya dicipta dan diposkan')->success();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        if($user->profiles->count() <= 0){
            flash('Pengguna masih belum mencipta profil pertukaran')->info();
            return redirect()->route('home');
        }

        $best_profiles = Profile::where('user_id' , '!=', $user->id)
            ->where('position' , '=', $user->profiles->first()->position)
            ->where('state_from', $user->profiles->first()->state_to)
            ->where('state_to', $user->profiles->first()->state_from)
            ->get();

        $ma = Thread::forUser($user->id)->latest('updated_at')->get();

        if($ma->count() > 0) {
            $threads = Thread::forUser($user->id)->latest('updated_at')->get();
        } else {
            $threads = Thread::forUser($user->id)->latest('updated_at')->get();
        }

        return view('profile.show', compact('user', 'threads', 'best_profiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = Auth::user()->profiles->first();
        return view('profil.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
