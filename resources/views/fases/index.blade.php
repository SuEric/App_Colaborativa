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
    <h2 class="titular">Fases</h2>
    <div class="contenido">
        <table class="tabla">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @foreach ($fases as $fase)
                <tr id="fase-{{$fase->fase_id}}">
                    <td data-label="Fase">{{ $fase->nombre }}</td>
                    <td data-label="Acción">
                        <a href="/fases/{{$fase->fase_id}}/edit" class="btn">Modificar</a>
                        <a id="btn_eliminar_fase" href="#" class="btn">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</article>
@stop