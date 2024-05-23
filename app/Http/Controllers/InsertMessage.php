<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsertMessage extends Controller
{
    public function send()
    {
        $chat_id = request('chat_id');
        $user_id = request('user_id');
        $text = request('text');

        Message::create([
            'chat_id' => $chat_id,
            'user_id' => $user_id,
            'text' => $text
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Message received and processed successfully'
        ]);
    }
}
