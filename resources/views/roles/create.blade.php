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
    <h2 class="titular">Agregar roles</h2>
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
                <label for="rol">Ingresa rol</label>
                <input placeholder="Ingrese rol" id="rol" type="text">
            </p>
            <p class="hide" id="derecho-field">
                <label for="derecho">Ingresa derecho</label>
                <input placeholder="Ingrese derecho" id="derecho" type="text">
            </p>
            <p class="hide" id="privilegio-field">
                <label for="privilegio">Ingresa privilegio</label>
                <input placeholder="Ingrese privilegio" id="privilegio" type="text">
            </p>
        </form>
    </div>
</article>
@stop