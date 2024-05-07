<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index', ['servicios' => $servicios]);
    }

    public function show(Servicio $servicio)
    {
        return view('servicios.show', ['servicio' => $servicio]);
    }

    public function create()
    {
        return view('servicios.create');
    }

    public function store(Servicio $servicio)
    {
        // validate
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);
        // auth?

        // store
        Servicio::create([
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price'),
            'image' => request('image'),
            'category' => "tech",
            'status' => true,
            'user_id' => 1
        ]);
        return redirect('/servicios');
    }
}
