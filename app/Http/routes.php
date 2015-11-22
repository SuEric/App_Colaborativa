<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('app');
});

/*
	Tareas
 */
Route::get('/tareas/control/{id}/actividades', 'TareaController@controlActividades');
Route::get('tareas/interaccion_vistas', function() {
	return view('interaccion_vistas/tareas');
});
Route::get('/tareas/interaccion_vistas/tipo', 'TareaController@interaccionTareas');
Route::get('/tareas/interaccion_vistas/{id}/fases', 'TareaController@interaccionFases');
Route::post('/tareas/prioridad/update/{id}', 'TareaController@updatePriority');
Route::post('/tareas/tipo/update/{id}', 'TareaController@updateType');
Route::resource('tareas', 'TareaController',
                ['except' => ['show']]);

/*
	Actividades
 */
Route::get('/actividades/control/{id}/recursos', 'ActividadController@controlRecursos');
Route::get('/actividades/interaccion_vistas/{id}/tareas', 'ActividadController@interaccionTareas');
Route::resource('actividades', 'ActividadController',
                ['only' => ['store' , 'update']]);

/*
	Recursos
 */
Route::get('recursos/interaccion_vistas', 'RecursoController@indexInteraccion');
Route::get('/recursos/interaccion_vistas/{id}/actividades', 'RecursoController@interaccionActividades');
Route::resource('recursos', 'RecursoController',
                ['only' => ['store', 'update']]);

/*
	Fases
 */
Route::get('/fases/prioridad', 'FaseController@indexWithPriorities');
Route::get('/fases/tareas', 'FaseController@indexWithTasks');
Route::get('/fases/control/{id}/tareas', 'FaseController@controlTareas');
Route::get('/fases/interaccion_vistas', 'FaseController@indexInteraccionVistas');
Route::get('/fases/interaccion_vistas/{id}/tareas', 'FaseController@controlTareas');
Route::get('/fases/interaccion_vistas/{id}/roles', 'FaseController@interaccionRoles');
Route::post('/fases/prioridad/update/{id}', 'FaseController@updatePriority');
Route::post('/fases/tareas/{id}', 'FaseController@storeTask');
Route::resource('fases', 'FaseController',
                ['except' => ['show']]);

/*
	Roles
 */
Route::get('/roles/tareas', 'RolController@indexWithTasks');
Route::get('/roles/control', 'RolController@control');
Route::get('roles/interaccion_vistas', 'RolController@interaccion_vistas');
Route::get('/roles/control/{id}/fases', 'RolController@controlFases');
Route::post('/roles/tareas/{id}', 'RolController@storeTask');
Route::resource('roles', 'RolController',
					 ['except' => ['show']]);