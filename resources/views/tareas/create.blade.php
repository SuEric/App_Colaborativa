@extends('app')

@section('content')
<div class="content">
    <h1 class="content_titular">Tareas</h1>
    <a class="btn" href="/tareas/create">Agregar tarea</a>
    <a class="btn" href="/tareas">Ver tareas</a>
</div>
<article class="seccion static">
    <h2 class="titular">Agregar tareas</h2>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="contenido">
        <form action="">
            <p>
                <label for="tarea">Ingresa tarea</label>
                <input placeholder="Ingrese tarea" id="tarea" type="text">
            </p>
            <p class="hide" id="actividad-field">
                <label for="actividad">Ingresa actividad</label>
                <input placeholder="Ingrese actividad" id="actividad" type="text">
                <a class="btn" id="btn_agregarActividad" href="#agregarActividad">Agregar Actividad</a>
                <a class="btn" id="btn_agregarRecurso" href="#agregarRecurso">Agregar Recurso</a>
                <a class="btn" id="btn_terminarActividad" href="#agregarRecurso">Terminar</a>
            </p>
            <p class="hide" id="recurso-field">
                <label for="recurso">Ingresa recurso</label>
                <input placeholder="Ingrese recurso" id="recurso" type="text">
                <a class="btn" id="btn_agregarRecursoActividad" href="#agregarRecurso">Agregar Recurso a Actividad</a>
                <a class="btn" id="btn_terminarRecurso" href="#agregarRecurso">Terminar</a>
            </p>
            <p>
                
            </p>
        </form>
    </div>
</article>
@stop