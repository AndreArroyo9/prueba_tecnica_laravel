<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store()
    {
        // dd(request()->all());
        // validate
        $messages = (new \App\Models\Servicio())->messages();


        request()->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'image' => 'required|image',
            // 'category' => 'required|in:tech,sports,home,health,beauty,other',
            // 'status' => 'required'
        ], $messages);

        // request()->validate([
        //     'image' => 'required|image',
        //     'title' => 'required|min:5'
        // ]);

        // Store the file in storage\app\public folder
        $file = request('image')->store('images','public');

        // Store the information in the database
        // auth?

        // store
        Servicio::create([
            'title' => request('title'),
            'description' => request('description'),
            'price' => number_format((float) request('price'), 2),
            'image' => $file,
            'category' => "tech",
            'status' => request('status'), // 1 ? public : private
            'user_id' => 1
        ]);
        return redirect('/servicios');
    }

    public function edit(Servicio $servicio)
    {
        // auth?
        return view('servicios.edit', ['servicio' => $servicio]);
    }

    public function update(Servicio $servicio){
        // validate
        request()->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'image' => 'nullable',
            'category' => 'required|in:tech,sports,home,health,beauty,other',
            // 'status' => 'required'
        ]);
    
        // auth?

        // update
        $servicio->update([
            'title' => request('title'),
            'description' => request('description'),
            'price' => number_format((float) request('price'), 2),
            // 'image' => $file, 
            'category' => request('category'),
            'status' => request('status')
        ]);
        
        return redirect('/servicios/'. $servicio->id);
    }


}
