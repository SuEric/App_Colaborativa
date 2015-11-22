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
    <h2 class="titular">Tareas por Fase</h2>
    <div class="contenido">
        <table class="tabla" id="fases">
            <thead>
                <tr>
                    <th>Fase</th>
                    <th>Tareas</th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @foreach ($fases as $fase)
                <tr id="fase-{{ $fase->fase_id }}">
                    <td data-label="Fase"> 
                        {{ $fase->nombre }}
                        <a class="btn fase_agregar_tarea" href="#"> + Tarea</a>
                    </td>
                    <td data-label="Tarea">
                        @if ( count($fase->tareas) != 0)
                        <table class="tablita">
                            <thead>
                                <tr>
                                    <th>Tarea</th>
                                    <th>Prioridad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fase->tareas as $tarea)
                                <tr>
                                    <td data-label="Tarea"> {{ $tarea->nombre }} </td>
                                    <td data-label="Prioridad">
                                        <input id="prioridad-{{ $tarea->tarea_id }}" type="text" value="{{ $tarea->prioridad }}">
                                        <a class="btn tarea_prioridad" href="#">Guardar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h3>No hay tareas</h3>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="tabla" id="tareas" style="display: none">
            <thead>
                <tr>
                    <th>Tarea</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @foreach ($tareas as $tarea)
                <tr id="tarea-{{$tarea->tarea_id}}">
                    <td data-label="Tarea">{{$tarea->nombre}}</td>
                    <td data-label="Acción">
                        <a href="#" class="btn agregar_a_fase">Agregar a Fase</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</article>
@stop