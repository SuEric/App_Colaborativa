@extends('app')

@section('content')
<div class="content">
    <h1 class="content_titular">Tareas</h1>
    <a class="btn" href="/tareas/create">Agregar tarea</a>
    <a class="btn" href="/tareas">Ver tareas</a>
</div>
<article class="seccion static">
    <h2 class="titular">Tareas</h2>
    <div class="contenido">
        <table class="tabla">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Actividades y Recursos</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @foreach ($tareas as $tarea)
                <tr id="tarea-{{$tarea->tarea_id}}">
                    <td data-label="Tarea">{{ $tarea->nombre }}</td>
                    <td data-label="Actividades y Recursos">
                        @if ( count($tarea->actividades) != 0 )
                        <table class="tablita">
                            <thead>
                                <tr>
                                    <th>Actividad</th>
                                    <th>Recursos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarea->actividades as $actividad)
                                <tr>
                                    <td data-label="Actividad">{{ $actividad->nombre }}</td>
                                    <td data-label="Recursos">
                                        @if ( count($actividad->recursos) != 0 )
                                        <table class="tablita">
                                            <tbody>
                                                @foreach($actividad->recursos as $recurso)
                                                <tr>
                                                    <td data-label="Recurso"> {{ $recurso->nombre }} </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <h3>No hay recursos</h3>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h3>No hay actividades</h3>
                        @endif
                    </td>
                    <td data-label="Acción">
                        <a href="/tareas/{{$tarea->tarea_id}}/edit" class="btn">Modificar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</article>
@stop