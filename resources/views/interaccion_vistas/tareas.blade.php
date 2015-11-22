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
    <h2 class="titular">Interacción por Tarea</h2>
    <div class="contenido">
        <label>Tipo de tarea:</label>
        <input id="tipo_datalist" list="tipos">
        <datalist id="tipos">
            <option id="1" value="Secuencial">
            <option id="2" value="Paralela">
            <option id="3" value="Semi-concurrente">
            <option id="4" value="Concurrente">
        </datalist>
        <div id="tablas">
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