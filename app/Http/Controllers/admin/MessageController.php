<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSentEvent;
use Auth;


class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:2']);
    }
    
    public function index()
    {
        return Message::with('user')->get();
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);
        // send event to listeners
        broadcast(new MessageSentEvent($message, $user))->toOthers();

        return [
            'message' => $message,
            'user' => $user,
        ];
    }
}
