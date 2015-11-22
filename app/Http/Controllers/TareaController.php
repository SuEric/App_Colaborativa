<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tarea;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas/index', compact('tareas'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
        ]);

        return Tarea::create($request->input());
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
        $tarea = \App\Tarea::find($id);
        return view('tareas/edit', compact('tarea'));
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
        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $tarea = Tarea::find($id);
        $tarea->nombre = $request->input('nombre');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->prioridad = $request->input('prioridad');
        $tarea->tipo = $request->input('tipo');

        $tarea->save();

        return response()->json($tarea, 200);
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

    public function updatePriority(Request $request, $id) {
        $tarea = Tarea::find($id);
        $tarea->prioridad = $request->input('prioridad');
        $tarea->save();
        return response()->json($tarea, 200);
    }

    public function updateType(Request $request, $id) {
        $tarea = Tarea::find($id);
        $tarea->tipo = $request->input('tipo');
        $tarea->save();
        return response()->json($tarea, 200);
    }

    public function controlActividades($id) {
        $tarea = Tarea::find($id);

        return response()->json($tarea->actividades, 200);
    }

    public function interaccionTareas(Request $request) {
        $tipo = $request->input('tipo');
        $tareas = Tarea::where('tipo', 4)->get();

        return $tareas;
    }

    public function interaccionFases($id) {
        $tarea = Tarea::find($id);

        return response()->json($tarea->fases, 200);
    }
}
