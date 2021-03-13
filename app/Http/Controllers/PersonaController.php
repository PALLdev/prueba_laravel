<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class PersonaController extends Controller
{
    protected function fetchApi(Request $request): Collection
    {
        $url = 'https://siichile.herokuapp.com/consulta';
        $rut = $request->rut;
        return collect(Http::get($url, ['rut' => $rut])->json())->map(fn ($datos) => $datos);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $rut = $request->rut;
        $datos = Http::get('https://siichile.herokuapp.com/consulta', ['rut' => $rut])->json();
        // dd($datos);
        $persona = new Persona();
        $persona->rut = $datos['rut'];
        $persona->razon_social = $datos['razon_social'];
        $persona->actividades = $datos['actividades'];
        $persona->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }
}
