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
    <h2 class="titular">Roles</h2>
    <div class="contenido">
        <table class="tabla">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Derecho</th>
                    <th>Privilegio</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @foreach ($roles as $rol)
                <tr id="rol-{{$rol->rol_id}}">
                    <td data-label="Rol"> {{ $rol->nombre }} </td>
                    <td data-label="Derecho"> {{ $rol->descripcion }} </td>
                    <td data-label="Privilegio"> {{ $rol->privilegio }} </td>
                    <td data-label="Acción">
                        <a href="roles/{{ $rol->rol_id }}/edit" class="btn">Modificar</a>
                        <a id="btn_eliminar_rol" href="#" class="btn">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</article>
@stop