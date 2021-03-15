<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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
        //
        $personas = Persona::all();
        return view('main')->with('data', $personas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rut = str_replace('.','',$request->rut);

        $persona = Persona::where('rut', $rut)->first();
        // dd($persona);
        if (!$persona) {
            $datos = $this->fetchApi($rut);
            $rutSinPuntos = $datos['rut'];
            // dd($datos);
            $persona = new Persona();
            $persona->rut = str_replace('.','',$rutSinPuntos);
            $persona->razon_social = $datos['razon_social'];
            $persona->actividades = $datos['actividades'];
            $persona->save();
            $msg = 'Agregado exitosamente!';
        }else{
            $msg = 'Este rut ya existe en la base de datos';
        }
        // dd($msg);
        $personas = Persona::all();
        return view('main')->with('msg',$msg)->with('data', $personas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */   
        
    public function edit($id)
    {
        //
        $persona = Persona::find($id);
        return view('edit')->with('persona', $persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        dd($request->input('rut'));
        $persona = Persona::find($id);
        $persona->rut = $request->input('rut');
        $persona->razon_social = $request->input('razon_social');
        $persona->update();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $persona = Persona::find($id);
        $persona->delete();
        return redirect('/');
    }
}
