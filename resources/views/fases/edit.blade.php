@extends('app')

@section('content')
<div class="content">
    <h1 class="content_titular">Fases</h1>
    <a class="btn" href="/fases/create">Agregar fase</a>
    <a class="btn" href="/fases">Ver fases</a>
    <a class="btn" href="/fases/prioridad">Ver prioridades</a>
    <a class="btn" href="/fases/tareas">Ver tareas</a>
</div>
<article class="seccion static">
    <h2 class="titular">Modificar Fase: {{$fase->nombre}}</h2>
    <div class="contenido" id="fase-{{$fase->fase_id}}">
        <p>
            <label for="fase">Fase</label>
            <input type="text" id="fase" value="{{$fase->nombre}}">
        </p>
        <p>
            <label for="fase_descripcion">Descripción</label>
            <textarea id="fase_descripcion">{{$fase->descripcion}}</textarea>
        </p>
        <p>
            <label for="fase_prioridad">Prioridad</label>
            <input type="text" id="fase_prioridad" value="{{$fase->prioridad}}">
        </p>
        <p>
            <a href="#" class="btn btn_modificar_fase">Guardar</a>
        </p>
        @if ( count($fase->tareas) != 0)
        <table class="tabla">
            <thead>
                <tr>
                    <th>Tarea</th>
                    <th>Prioridad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @foreach ($fase->tareas as $tarea)
                <tr id="tarea-{{$tarea->tarea_id}}">
                    <td>
                        <input type="text" id="tarea_nombre" value="{{ $tarea->nombre }}">
                    </td>
                    <td>
                        <input type="text" id="tarea_prioridad" value="{{ $tarea->prioridad }}">
                    </td>
                    <td>
                        <a href="#" class="btn btn_fase_modificar_tarea">Guardar</a>
                        <a href="#" class="btn">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</article>
@stop