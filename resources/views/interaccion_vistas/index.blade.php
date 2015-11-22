@extends('app')

@section('content')
<div class="content">
    <h1 class="content_titular">Interacción y Vistas</h1>
    <a class="btn" href="/fases/interaccion_vistas">Especificación</a>
    <a class="btn" href="/roles/interaccion_vistas">Interacción por Rol</a>
    <a class="btn" href="/tareas/interaccion_vistas">Interacción por Tarea</a>
    <a class="btn" href="/recursos/interaccion_vistas">Interacción por Recurso</a>
    <a class="btn" href="#">Interacción por Vista</a>
</div>
<div class="content">
    <h1 class="content_titular"></h1>
    <label>Fase:</label>
    <input id="fase_datalist" list="fases">
    <datalist id="fases">
        @foreach ($fases as $fase)
        <option id="fase-{{$fase->fase_id}}" value="{{$fase->nombre}}">
        @endforeach
    </datalist>
</div>

<article class="seccion hide">
    <h2 class="titular"></h2>
    <div class="contenido">
        <table class="tabla" id="tareas">
        </table>
    </div>
</article>
@stop