<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all()->where('status','=','1');
        return view('servicios.index', ['servicios' => $servicios]);
    }

    public function show(Servicio $servicio)
    {
        $serviciosCreator = $servicio->creator->servicios->where('status','=','1');
        return view('servicios.show', ['servicio' => $servicio, 'serviciosCreator' => $serviciosCreator]);
    }

    public function create()
    {
        return view('servicios.create');
    }

    public function store()
    {
        // validate
        $rules = (new \App\Models\Servicio())->messages();


        request()->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'image' => 'required|image',
            // 'category' => 'required|in:tech,sports,home,health,beauty,other',
            // 'status' => 'required'
        ], $rules);


        // Store the file in storage\app\public folder
        $file = request('image')->store('images','public');

        // Store the information in the database
        Servicio::create([
            'title' => request('title'),
            'description' => request('description'),
            'price' => number_format((float) request('price'), 2),
            'image' => $file,
            'status' => request('status'), // 1 = public, 0 = private
            'category' => request('category'),
            'creator_id' => Auth::user()->creator->id
        ]);

        return redirect('/servicios');
    }

    public function edit(Servicio $servicio)
    {

        // Return the view
        return view('servicios.edit', ['servicio' => $servicio]);
    }

    public function update(Servicio $servicio){
        // validate
        request()->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'image' => 'nullable',
            // 'status' => 'required'
        ]);


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

    public function destroy(Servicio $servicio){

        $servicio->delete();

        return redirect('/servicios');
    }

    public function contratar(Servicio $servicio)
    {
        Auth::user()->customer->servicios()->attach($servicio->id);
        return redirect('/servicios');
    }
    public function misServicios(){
        // Servicios que el usuario ha contratado
        $misServicios = Auth::user()->customer->servicios;

        return view('servicios.mis-servicios', ['misServicios' => $misServicios]);
    }

    public function category(String  $category)
    {
        switch ($category) {
            case 'music':
                $category = 'Música';
                $servicios = Servicio::all()->where('status', '=', '1')->where('category', '=', $category);
                break;
            case 'sports':
                $category = 'Deportes';
                $servicios = Servicio::all()->where('status', '=', '1')->where('category', '=', $category);
                break;
            case 'tech':
                $category = 'Tecnología';
                $servicios = Servicio::all()->where('status', '=', '1')->where('category', '=', $category);
                break;
            default:
                return redirect('/servicios');
        }

        if ($servicios->isNotEmpty()) {
            return view('servicios.category', ['servicios' => $servicios, 'category' => $category]);
        }else{
            return view('servicios.category', ['servicios' => $servicios, 'category' => $category]);
        }
    }



}
