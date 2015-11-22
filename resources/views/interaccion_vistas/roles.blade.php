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
<article class="seccion static">
    <h2 class="titular">Interacción por Rol</h2>
    <div class="contenido">
        <label>Rol:</label>
        <input id="rol_datalist" list="roles">
        <datalist id="roles">
            @foreach ($roles as $rol)
            <option id="rol-{{$rol->rol_id}}" value="{{$rol->nombre}}">
            @endforeach
        </datalist>
        <div id="tablas">
            <table class="tabla" id="fases_interaccion" style="float: left;">
            </table>
            <table class="tabla" id="tareas" style="float: left;">
            </table>
        </div>
    </div>
</article>
@stop