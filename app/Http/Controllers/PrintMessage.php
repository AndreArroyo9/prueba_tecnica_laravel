<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Servicio;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrintMessage extends Controller
{
    public function index($servicio_id, $user_id){
        $servicio = Servicio::all()->find($servicio_id);

        $creator_id = $servicio->creator->user->id;

        $messages = DB::table('messages')->where('servicio_id', '=', $servicio_id)->where(function (Builder $query) use ($user_id, $creator_id) {
            $query->where('user_id', '=', $creator_id )->orWhere('user_id','=', $user_id);
        })->get();
        $counter = 0;
        foreach ($messages as $message) {
            $userName = DB::table('users')->where('id', '=', $message->user_id)->first();
            $messagesJSON[$counter] = [
                'user_id' => $message->user_id,
                'message' => $message->text,
                'user_name' => $userName->name,
            ];
            $counter++;
        }

        return view('servicios.chat' , ['servicio' => $servicio]);

    }
    public function updateMessages($servicio_id, $user_id)
    {
        $servicio = Servicio::all()->find($servicio_id);

        $creator_id = $servicio->creator->user->id;

        $messages = DB::table('messages')->where('servicio_id', '=', $servicio_id)->where(function (Builder $query) use ($user_id, $creator_id) {
            $query->where('user_id', '=', $creator_id )->orWhere('user_id','=', $user_id);
        })->get();
        $counter = 0;
        foreach ($messages as $message) {
            $userName = DB::table('users')->where('id', '=', $message->user_id)->first();
            $messagesJSON[$counter] = [
                'user_id' => $message->user_id,
                'message' => $message->text,
                'user_name' => $userName->name,
            ];
            $counter++;
        }

        return response()->json($messagesJSON);
    }
}
