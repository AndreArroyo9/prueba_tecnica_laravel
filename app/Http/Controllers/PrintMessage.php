<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrintMessage extends Controller
{
    public function updateMessages($servicio_id)
    {
//        $messages = Message::where('servicio_id', '=', $servicio_id)->orWhere('user_id', '=', Auth::id() )->get();
        $messages = DB::table('messages');
        if ($messages == null) {
            return response()->json([]);
        }

        return response()->json([
            'user_id' => $messages->user_id,
            'servicio_id' => $messages->servicio_id,
            'text' => $messages->text
        ]);
    }
}
