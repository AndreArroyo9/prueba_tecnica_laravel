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

}
