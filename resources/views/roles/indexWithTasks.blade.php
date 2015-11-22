@extends('app')

@section('content')
<div class="content">
    <h1 class="content_titular">Roles</h1>
    <a class="btn" href="/roles/create">Agregar fase</a>
    <a class="btn" href="/roles">Ver roles</a>
    <a class="btn" href="/roles/tareas">Ver tareas</a>
    <a class="btn" href="/roles/control">Control de Acceso</a>
</div>
<article class="seccion static">
    <h2 class="titular">Tareas por Rol</h2>
    <div class="contenido">
        <table class="tabla" id="roles">
            <thead>
                <tr>
                    <th>Rol</th>
                    <th>Tareas</th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @foreach ($roles as $rol)
                <tr id="rol-{{ $rol->rol_id }}">
                    <td data-label="Rol"> 
                        {{ $rol->nombre }}
                        <a class="btn rol_agregar_tarea" href="#"> + Tarea</a>
                    </td>
                    <td data-label="Tarea">
                        @if ( count($rol->tareas) != 0)
                        <table class="tablita">
                            <thead>
                                <tr>
                                    <th>Tarea</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rol->tareas as $tarea)
                                <tr>
                                    <td data-label="Tarea"> {{ $tarea->nombre }} </td>
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
                        <a href="#" class="btn agregar_a_rol">Agregar a Rol</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</article>
@stop