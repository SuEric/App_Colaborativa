@extends('app')

@section('content')
<div class="content">
    <h1 class="content_titular">Roles</h1>
    <a class="btn" href="/roles/create">Agregar rol</a>
    <a class="btn" href="/roles">Ver roles</a>
    <a class="btn" href="/roles/prioridad">Ver prioridades</a>
    <a class="btn" href="/roles/tareas">Ver tareas</a>
    <a class="btn" href="/roles/control">Control de Acceso</a>
</div>
<article class="seccion static">
    <h2 class="titular">Modificar Rol: {{$rol->nombre}}</h2>
    <div class="contenido" id="rol-{{$rol->rol_id}}">
        <p>
            <label for="rol">Rol</label>
            <input type="text" id="rol" value="{{$rol->nombre}}">
        </p>
        <p>
            <label for="rol_descripcion">Descripción</label>
            <textarea id="rol_descripcion">{{$rol->descripcion}}</textarea>
        </p>
        <p>
            <label for="rol_privilegio">Privilegio</label>
            <input type="text" id="rol_privilegio" value="{{$rol->privilegio}}">
        </p>
        <p>
            <a href="#" class="btn btn_modificar_rol">Guardar</a>
            <a href="#" class="btn btn_eliminar_rol">Eliminar</a>
        </p>
        @if ( count($rol->tareas) != 0)
        <table class="tabla">
            <thead>
                <tr>
                    <th>Tarea</th>
                    <th>Prioridad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @foreach ($rol->tareas as $tarea)
                <tr id="tarea-{{$tarea->tarea_id}}">
                    <td>
                        <input type="text" id="tarea_nombre" value="{{ $tarea->nombre }}">
                    </td>
                    <td>
                        <input type="text" id="tarea_prioridad" value="{{ $tarea->prioridad }}">
                    </td>
                    <td>
                        <a href="#" class="btn btn_fase_modificar_tarea">Guardar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</article>
@stop