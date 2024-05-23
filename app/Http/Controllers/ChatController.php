<?php

namespace App\Http\Controllers;

use App\Jobs\SendMessage;
use App\Models\Chat;
use App\Models\Servicio;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function store($servicio_id, $user_id){
        $servicio = Servicio::all()->find($servicio_id);

        $chat = Chat::create([
            'user_id' => $user_id,
            'servicio_id' => $servicio_id
        ]);
        return view('servicios.chat' , ['servicio' => $servicio, 'user_id' => $user_id,'chat' => $chat]);
    }

    public function chat($servicio_id, $user_id){
        $servicio = Servicio::all()->find($servicio_id);
        $chat = DB::table('chats')->where('user_id', $user_id)->where('servicio_id', $servicio_id)->first();


        return view('servicios.chat' , ['servicio' => $servicio, 'user_id' => $user_id,'chat' => $chat]);
    }
    public function updateMessages($servicio_id, $user_id, $chat_id)
    {
        $servicio = Servicio::all()->find($servicio_id);

        $messages = DB::table('messages')->where('chat_id', '=', $chat_id)->get();

        $counter = 0;
        foreach ($messages as $message) {
            $userName = DB::table('users')->where('id', '=', $message->user_id)->first();
            $messagesJSON[$counter] = [
                'user_id' => $message->user_id,
                'message' => $message->text,
                'user_name' => $userName->name
            ];
            $counter++;
        }
        return response()->json($messagesJSON);
    }

}
