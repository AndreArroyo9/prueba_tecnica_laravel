<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $servicios = Servicio::all();

        return view('admin.control-panel', ['servicios' => $servicios, 'status' => 3]);
    }

    public function publico(){
        $servicios = Servicio::all()->where('status', 1);

        return view('admin.control-panel', ['servicios' => $servicios, 'status' => 1]);
    }

    public function privado(){
        $servicios = Servicio::all()->where('status', 0);

        return view('admin.control-panel', ['servicios' => $servicios, 'status' => 0]);
    }
}
