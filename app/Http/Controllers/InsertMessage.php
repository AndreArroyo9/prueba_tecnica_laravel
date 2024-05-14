<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsertMessage extends Controller
{
    public function send()
    {
        Message::create([
            'user_id' => request('user_id'),
            'servicio_id' => request('servicio_id'),
            'text' => request('message')
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Message received and processed successfully'
        ]);
    }
}
