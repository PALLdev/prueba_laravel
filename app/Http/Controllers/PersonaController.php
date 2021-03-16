<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade as PDF;

class PersonaController extends Controller
{
    public function fetchApi(string $rut)
    {
        $url = 'https://siichile.herokuapp.com/consulta';
        return Http::get($url, ['rut' => $rut])->json();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return view('main')->with('data', $personas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate(['rut'=>'required']);

        $rutSinPunto = str_replace('.','',request('rut'));
        $datos = $this->fetchApi($rutSinPunto);
        $persona = Persona::where('rut', $rutSinPunto)->first();

        if (!$persona) {
            $rutFromApi = $datos['rut'];
            Persona::create([
                'rut' => str_replace('.','',$rutFromApi),
                'razon_social' => $datos['razon_social'],
                'actividades' => $datos['actividades'],
            ]);
            $msg = 'Agregado exitosamente!';
        }else{
            $msg = 'Este rut ya existe en la base de datos';
        }
        $personas = Persona::all();
        return view('main')->with('msg',$msg)->with('data', $personas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */   
        
    public function edit(Persona $id)
    {
        return view('edit')->with('persona', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Persona $id)
    {
        request()->validate([
            'rut'=>'required',
            'razon_social' => 'required',
            'actividades' => 'required'
            ]);

        dd(request('actividades'));
        $id->rut = request('rut');
        $id->razon_social = request('razon_social');
        $id->update();
        return redirect('/'. $id->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $id)
    {
        $id->delete();
        return redirect('/');
    }

    public function exportPdf()
    {
        $personas = Persona::all();
        view()->share('personas',$personas);
        $pdf = PDF::loadView('personas')->setOptions(['defaultFont' => 'sans-serif']);;
        return $pdf->stream();
    }
}
