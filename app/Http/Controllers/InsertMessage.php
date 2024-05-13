<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class InsertMessage extends Controller
{
    public function send()
    {
        Message::create([
            'servicio_id' => request('servicio_id'),
            'text' => request('text')
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Message received and processed successfully'
        ]);
    }
}
