<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosEvento['eventos']=Evento::paginate(5);

        return view('eventos.indexEvento',$datosEvento);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventos.createEvento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEvento = request()->all();
        $datosEvento = request()->except('_token');

        //return response()->json($datosEvento);
        Evento::insert($datosEvento);

        return redirect('evento')->with('mensaje', '¡Evento registrado exitosamente!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $evento=Evento::findOrFail($id);


        return view('eventos.editEvento', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEvento = request()->except(['_token', '_method']);
        Evento::where('id','=',$id)->update($datosEvento);

        $evento=Evento::findOrFail($id);
        return view('eventos.editEvento', compact('evento'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Evento::destroy($id);
        return redirect('evento')->with('mensaje', 'Evento borrado exitosamente!');
    }
}
