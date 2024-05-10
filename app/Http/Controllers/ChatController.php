<?php

namespace App\Http\Controllers;

use App\Jobs\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        SendMessage::dispactch($message);

        // Return response
        return response()->json([
            'succes' => true,
            'message' => 'Message create and job dispatched!'
        ]);
    }
}
