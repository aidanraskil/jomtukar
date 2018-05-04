<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Input;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Illuminate\Http\Request;

class MessagesController extends Controller
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

    public function index()
    {
    	// All threads, ignore deleted/archived participants
        // $threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
         // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();
         // $users = User::where('id', '!=', Auth::id())->get();

        // $users = User::

         return view('messenger.index', compact('threads', 'users'));
    }


    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create($id)
    {
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();

        $user = User::where('id', '!=', Auth::id())->where('id', $id)->first();
        return view('messenger.create', compact('user', 'threads'));
    }

    public function store()
    {
    	$input = Input::all();

    	$thread = Thread::create([
            'subject' => Auth::id(),
        ]);
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $input['message'],
        ]);
        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }

        return redirect()->route('messages');
    }

    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            // flash('Thread dengan ID: ' . $id . ' tidak dijumpai.')->error();
            return redirect()->route('messages.create', $id);
        }
        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // don't show the current user in list
        if(!$thread->hasParticipant(\Auth::id())) {
            flash('Maaf anda tidak boleh membaca mesej orang lain')->error();
            return redirect()->back();
        }

        $thread->getParticipantFromUser(Auth::id());

        $userId = Auth::id();

        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

        $thread->markAsRead($userId);

        $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();

        return view('messenger.show', compact('thread', 'threads', 'users'));
    }

     public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            flash('Thread dengan ID: ' . $id . ' tidak dijumpai.')->error();
            return redirect()->route('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => Input::get('message'),
        ]);
        // Add replier as a participant
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
        ]);

        $participant->last_read = new Carbon;

        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }
        return redirect()->route('messages.show', $id);
    }

    public function destroy($id)
    {
        $thread = Thread::findOrFail($id);

        $thread->delete();

        flash('Mesej telah berjaya dipadam')->success();

        return redirect()->route('messages');
    }
}
