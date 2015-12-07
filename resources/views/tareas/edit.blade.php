@extends('app')

@section('content')
<div class="content">
    <h1 class="content_titular">Tareas</h1>
    <a class="btn" href="/tareas/create">Agregar tarea</a>
    <a class="btn" href="/tareas">Ver tareas</a>
</div>
<article class="seccion static">
    <h2 class="titular">Modificar Tarea: {{$tarea->nombre}}</h2>
    <div class="contenido" id="tarea-{{$tarea->tarea_id}}">
        <p>
            <label for="tarea">Tarea</label>
            <input type="text" id="tarea" value="{{$tarea->nombre}}">
        </p>
        <p>
            <label for="tarea_descripcion">Descripción</label>
            <textarea id="tarea_descripcion">{{$tarea->descripcion}}</textarea>
        </p>
        <p>
            <label for="tarea_prioridad">Prioridad</label>
            <input type="text" id="tarea_prioridad" value="{{$tarea->prioridad}}">
        </p>
        <p>
            <label for="tarea_tipo">Tipo</label>
            <select id="tarea_tipo">
                <option value="1" @if($tarea->tipo == 1)selected @endif>Secuencial</option>
                <option value="2" @if($tarea->tipo == 2)selected @endif>Paralela</option>
                <option value="3" @if($tarea->tipo == 3)selected @endif>Semi-Concurrente</option>
                <option value="4" @if($tarea->tipo == 4)selected @endif>Concurrente</option>
            </select>
        </p>
        <p class="hide">
            <label for="tarea_precedente">Precedente</label>
            <select id="tarea_tipo">
                <option value="1">Secuencial</option>
                <option value="2">Paralela</option>
                <option value="3">Semi-Concurrente</option>
                <option value="4">Concurrente</option>
            </select>
        </p>
        <p>
            <a href="#" class="btn btn_modificar_tarea">Guardar</a>
        </p>
        @if ( count($tarea->actividades) != 0 )
        <table class="tabla">
            <thead>
                <tr>
                    <th>Actividades</th>
                    <th>Recursos</th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @foreach ($tarea->actividades as $actividad)
                <tr id="actividad-{{$actividad->actividad_id}}">
                    <td>
                        <input type="text" id="actividad" value="{{ $actividad->nombre }}">
                        <a href="#" class="btn btn_modificar_actividad">Guardar</a>
                        <a href="#" class="btn btn_eliminar_actividad">Eliminar</a>
                    </td>
                    <td>
                        <table class="tablita">
                            <tbody>
                                @foreach ($actividad->recursos as $recurso)
                                <tr id="recurso-{{$recurso->recurso_id}}">
                                    <td>
                                        <input type="text" id="recurso" value="{{$recurso->nombre}}">
                                        <a href="#" class="btn btn_modificar_recurso">Guardar</a>
                                        <a href="#" class="btn btn_eliminar_recurso">Eliminar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</article>
@stop