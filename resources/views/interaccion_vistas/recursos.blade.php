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
    <h2 class="titular">Interacción por Recurso</h2>
    <div class="contenido">
        <label>Recurso:</label>
        <input id="recurso_datalist" list="recursos">
        <datalist id="recursos">
            @foreach ($recursos as $recurso)
            <option id="recurso-{{$recurso->recurso_id}}" value="{{$recurso->nombre}}">
            @endforeach
        </datalist>
        <div id="tablas">
            <table class="tabla" id="actividades" style="float: left;">
            </table>
            <table class="tabla" id="tareas" style="float: left;">
            </table>
            <table class="tabla" id="fases" style="float: left;">
            </table>
            <table class="tabla" id="roles" style="float: left;">
            </table>
        </div>
    </div>
</article>
@stop