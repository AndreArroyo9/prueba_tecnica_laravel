<?php

namespace App\Http\Controllers;

use App\Jobs\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class ChatController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('chat', ['user' => $user]);
    }
    public function messages(){
        $messages = Message::with('user')->get()->append('time');

        return response()->json($messages);
    }

    public function message(){
        // Create message
        $message = Message::create([
            'user_id' => Auth::id(),
            'text' => request('text')
        ]);

        // Dispatch queue job
        event(new \App\Events\GotMessage($message));
//        dispatch(new SendMessage($message));

        // Return response
        return response()->json([
            'success' => true,
            'message' => 'Message create and job dispatched!'
        ]);
    }
}
