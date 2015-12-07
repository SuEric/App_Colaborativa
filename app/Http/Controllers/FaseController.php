<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Fase;
use App\Tarea;

class FaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fases = Fase::all();
        return view('fases/index', compact('fases'));
    }

    public function indexWithPriorities() {
        $fases = Fase::all();
        return view('fases/indexWithPriorities', compact('fases'));
    }

    public function indexWithTasks() {
        $fases = Fase::all();
        $tareas = Tarea::all();

        return view('fases/indexWithTasks', compact('fases', 'tareas'));
    }

    public function indexInteraccionVistas() {
        $fases = Fase::all();
        return view('interaccion_vistas/index', compact('fases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fases/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Fase::create($request->input());
    }

    public function storeTask(Request $request, $id) {
        $fase = Fase::find($id);
        $tarea = Tarea::find($request->input('tarea_id'));
        $fase->tareas()->attach($tarea);
        $fase->save();
        return response()->json($tarea, 200);
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
        $fase = \App\Fase::find($id);
        return view('fases/edit', compact('fase'));
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

        $fase = Fase::find($id);
        $fase->nombre = $request->input('nombre');
        $fase->descripcion = $request->input('descripcion');
        $fase->prioridad = $request->input('prioridad');

        $fase->save();

        return response()->json($fase, 200);
    }

    public function updatePriority(Request $request, $id) {
        $fase = Fase::find($id);
        $fase->prioridad = $request->input('prioridad');
        $fase->save();
        return response()->json($fase, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fase = Fase::find($id);
        $fase->delete();

        return response()->json($fase, 200);
    }

    public function controlTareas($id) {
        $fase = Fase::find($id);
        return response()->json($fase->tareas, 200);
    }

    public function interaccionRoles($id) {
        $fase = Fase::find($id);

        $roles = $fase->getRoles($id);

        return response()->json($roles, 200);
    }
}
