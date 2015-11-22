<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rol;
use App\Tarea;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::all();
        return view('roles/index', compact('roles'));
    }

    public function indexWithTasks() {
        $roles = Rol::all();
        $tareas = Tarea::all();

        return view('roles/indexWithTasks', compact('roles', 'tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Rol::create($request->input());
    }

    public function storeTask(Request $request, $id)
    {
        $rol = Rol::find($id);
        $tarea = Tarea::find($request->input('tarea_id'));
        $rol->tareas()->attach($tarea);
        $rol->save();
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
        $rol = \App\Rol::find($id);
        return view('roles/edit', compact('rol'));
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

        $rol = Rol::find($id);
        $rol->nombre = $request->input('nombre');
        $rol->descripcion = $request->input('descripcion');
        $rol->privilegio = $request->input('privilegio');

        $rol->save();

        return response()->json($rol, 200);
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

    public function control() {
        $roles = Rol::all();
        return view('roles/control', compact('roles'));
    }

    public function controlFases($id) {
        $rol = Rol::find($id);

        $fases = $rol->getFases($id);

        return response()->json($fases, 200);
    }

    public function interaccion_vistas() {
        $roles = Rol::all();
        return view('interaccion_vistas/roles', compact('roles'));
    }
}
