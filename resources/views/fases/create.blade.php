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
    <h2 class="titular">Agregar fases</h2>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="contenido">
        <form action="">
            <p>
                <label for="fase">Ingresa fase</label>
                <input placeholder="Ingrese fase" id="fase" type="text">
            </p>
        </form>
    </div>
</article>
@stop