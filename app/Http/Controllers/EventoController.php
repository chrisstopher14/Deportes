<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Deporte;
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
        $evento = new Evento();
        $deportes = Deporte::pluck('nombreDeporte', 'id_deporte');

        $datosEvento['eventos']=Evento::paginate(3);

        return view('eventos.indexEvento',$datosEvento, compact('deportes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evento = new Evento();
        $deportes = Deporte::pluck('nombreDeporte', 'id_deporte');
        $deportes->all();

        return view('eventos.createEvento', compact('evento','deportes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validacionCampos=[
            'nombreEvento'=>'required|string|max:100',
            'fechaEvento'=>'required|string|max:100',
            'ubicacionEvento'=>'required|string|max:100',
            'participantesEvento'=>'required|max:50',
            'deporte_id'=>'required',
        ];
        $mensaje=[
            'nombreEvento.required'=>'El nombre del evento es requerido.',
            'fechaEvento.required'=>'La fecha del evento es requerida.',
            'ubicacionEvento.required'=>'La ubicacion del evento es requerida.',
            'participantesEvento.required'=>'El número de participantes es requerido.',
            'deporte_id.required'=>'El tipo de deporte es requerido.'

        ];

        $this->validate($request, $validacionCampos,$mensaje);

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
        $evento = new Evento();
        $deportes = Deporte::pluck('nombreDeporte', 'id_deporte');
        $deportes->all();
        $evento=Evento::findOrFail($id);


        return view('eventos.editEvento', compact('evento','deportes'));
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
        $validacionCampos=[
            'nombreEvento'=>'required|string|max:100',
            'fechaEvento'=>'required|string|max:100',
            'ubicacionEvento'=>'required|string|max:100',
            'participantesEvento'=>'required|max:50',
            'deporte_id'=>'required',
        ];
        $mensaje=[
            'nombreEvento.required'=>'El nombre del evento es requerido.',
            'fechaEvento.required'=>'La fecha del evento es requerida.',
            'ubicacionEvento.required'=>'La ubicacion del evento es requerida.',
            'participantesEvento.required'=>'El número de participantes es requerido.',
            'deporte_id.required'=>'El tipo de deporte es requerido.'

        ];

        $this->validate($request, $validacionCampos,$mensaje);


        $datosEvento = request()->except(['_token', '_method']);
        Evento::where('id','=',$id)->update($datosEvento);

        $evento=Evento::findOrFail($id);
        //return view('eventos.editEvento', compact('evento'));
        return redirect('evento')->with('mensaje', 'Evento editado exitosamente!');
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
