@extends('app')

@section('content')
<div class="content">
    <h1 class="content_titular">Roles</h1>
    <a class="btn" href="/roles/create">Agregar rol</a>
    <a class="btn" href="/roles">Ver roles</a>
    <a class="btn" href="/roles/tareas">Ver tareas</a>
    <a class="btn" href="/roles/control">Control de Acceso</a>
</div>
<article class="seccion static">
    <h2 class="titular">Control de Accesso por Rol</h2>
    <div class="contenido">
        <label>Rol:</label>
        <input id="rol_datalist" list="roles">
        <datalist id="roles">
            @foreach ($roles as $rol)
            <option id="rol-{{$rol->rol_id}}" value="{{$rol->nombre}}">
            @endforeach
        </datalist>
        <div id="tablas">
            <table class="tabla" id="fases" style="float: left;">
            </table>
            <table class="tabla" id="tareas" style="float: left;">
            </table>
            <table class="tabla" id="actividades" style="float: left;">
            </table>
            <table class="tabla" id="recursos" style="float: left;">
            </table>
        </div>
    </div>
</article>
@stop