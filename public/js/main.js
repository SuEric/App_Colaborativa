/** Funcion onReady */
$(document).ready(function() {
	var tarea = {

	};

	var actividad = {

	};

	var recurso = {

	};

	var fase = {

	};

	var rol = {

	};

	/*
		TAREAS
	 */

	$('#tarea').keypress(function(ev) {
		if(ev.keyCode == 13){
			ev.preventDefault();
			if ($('#tarea').val() == "") {
				alert("Ingrese una tarea");
			}
			else {
				
				tarea.nombre = $('#tarea').val()

				$.ajax({
					headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		         },
					url : '/tareas',
					type : 'post',
					dataType : 'json',
					data : tarea,
					success : function(datos) {
						tarea.tarea_id = datos.tarea_id;
						$('#actividad-field').slideDown();
					}
				})
			}
		}
	});
	
	$('#btn_agregarActividad').on('click', function() {
		if ($('#actividad').val() == "") {
			alert("Ingrese una actividad");
		}
		else {
			actividad.nombre = $('#actividad').val();
			actividad.tarea_id = tarea.tarea_id;
			
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/actividades',
				type : 'post',
				dataType : 'json',
				data : actividad,
				success: function(datos) {
					$('#actividad').val('');
				}
			});
		}
	});

	$('#btn_agregarRecurso').on('click', function() {
		if ($('#actividad').val() == "") {
			alert("Ingrese una actividad");
		}
		else {
			actividad.nombre = $('#actividad').val();
			actividad.tarea_id = tarea.tarea_id;
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/actividades',
				type : 'post',
				dataType : 'json',
				data : actividad,
				success: function(datos) {
					actividad.actividad_id = datos.actividad_id;
				}
			});

			$('#recurso-field').slideDown();
		}
	});

	$('#btn_terminarActividad').on('click', function() {
		$('#actividad').val('');
		$('#actividad-field').slideUp();
	});

	$('#btn_terminarRecurso').on('click', function() {
		$('#recurso').val('');
		$('#recurso-field').slideUp();
	});

	$('#btn_agregarRecursoActividad').on('click', function() {
		if ($('#recurso').val() == "") {
			alert("Ingrese un recurso");
		}
		else {
			recurso.nombre = $('#recurso').val();
			recurso.actividad = actividad;

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/recursos',
				type : 'post',
				dataType : 'json',
				data : recurso,
				success: function(datos) {
					$('#recurso').val('');
				}
			});
		}
	});

	$('.btn_eliminar_tarea').on('click', function(ev) {
		ev.preventDefault();

		var tarea_id_attr = $(this).parents('tr').attr('id');
		var id = tarea_id_attr.substring(6, tarea_id_attr.length);

		$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/tareas/' + id,
				type : 'delete',
				dataType : 'json',
				success: function(dato) {
					location.reload();
				}
		});
	});

	$('.btn_modificar_tarea').on('click', function(ev) {
		ev.preventDefault();
		if ($('#tarea').val() == "") {
			alert("Ingrese un recurso");
		}
		else {
			var tarea_id_attr = $(this).parents('.contenido').attr('id');
			var id = tarea_id_attr.substring(6, tarea_id_attr.length);
			tarea.nombre = $('#tarea').val();
			tarea.descripcion = $('#tarea_descripcion').val();
			tarea.prioridad = $('#tarea_prioridad').val();
			tarea.tipo = $('#tarea_tipo').val();

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/tareas/'+id,
				type : 'put',
				dataType : 'json',
				data : tarea,
				success: function(datos) {
					location.reload();
				}
			});
		}
	});

	$('.btn_modificar_actividad').on('click', function(ev) {
		ev.preventDefault();
		if ($('#actividad').val() == "") {
			alert("Ingrese un recurso");
		}
		else {
			var actividad_id_attr = $(this).parents('tr').attr('id');
			var id = actividad_id_attr.substring(10, actividad_id_attr.length);
			actividad.nombre = $('#actividad').val();
			
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/actividades/'+id,
				type : 'put',
				dataType : 'json',
				data : actividad,
				success: function(datos) {
					location.reload();
				}
			});
		}
	});

	$('.btn_modificar_recurso').on('click', function(ev) {
		ev.preventDefault();
		if ($('#recurso').val() == "") {
			alert("Ingrese un recurso");
		}
		else {
			var recurso_id_attr = $(this).parents('tr').attr('id');
			var id = recurso_id_attr.substring(8, recurso_id_attr.length);
			recurso.nombre = $('#recurso').val();
			
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/recursos/'+id,
				type : 'put',
				dataType : 'json',
				data : recurso,
				success: function(datos) {
					location.reload();
				}
			});
		}
	});

	/*
		FASES
	 */
	
	$('#fase').keypress(function(ev) {
		if(ev.keyCode == 13) {
			ev.preventDefault();
			if ($('#fase').val() == "") {
				alert("Ingrese una fase");
			}
			else {
				var fase = {
					'nombre' : $('#fase').val()
				};

				$.ajax({
					headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		         },
					url : '/fases',
					type : 'post',
					dataType : 'json',
					data : fase,
					success : function(datos) {
						alert('Fase ' + datos.nombre + " guardada");
						$('#fase').val('');
					}
				});
			}
		}
	});

	$('.fase_prioridad').on('click', function(ev) {
		ev.preventDefault();

		var prioridad = $(this).siblings().first().val();
		var fase_id_attr = $(this).siblings().first().attr('id');
		var id = fase_id_attr.substring(10, fase_id_attr.length);
		
		$.ajax({
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
			url : '/fases/prioridad/update/'+id,
			type : 'post',
			dataType : 'json',
			data : { prioridad : prioridad },
			success : function(datos) {
			}
		});
	});

	$('.fase_agregar_tarea').on('click', function(ev) {
		ev.preventDefault();
		var fase_id_attr = $(this).parents('tr').attr('id');
		fase.fase_id = $(this).parents('tr').attr('id').substring(5, fase_id_attr.length);

		$('#fases').css('float', 'left');
		$('#tareas').show();
	});

	$('.agregar_a_fase').on('click', function() {
		var tarea_id_attr = $(this).parents('tr').attr('id');
		var tarea_id = $(this).parents('tr').attr('id').substring(6, tarea_id_attr.length);
		$.ajax({
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
			url : '/fases/tareas/'+fase.fase_id,
			type : 'post',
			dataType : 'json',
			data : { tarea_id : tarea_id },
			success : function(datos) {
				var fila_tarea = '<tr style="display: none;"> \
                                    <td data-label="Tarea">' + datos.nombre + '</td> \
                                </tr>';
            $('#fases').css('float', 'none');
				$(fila_tarea).appendTo($('#fase-'+fase.fase_id).find('.tablita tbody')).show('slow');
				$('#tareas').hide('slow');
			},
			error : function(jqXHR, textStatus, errorThrown) {
				alert('La tarea ya está agregada');
			}
		});
	});

	$('.tarea_prioridad').on('click', function(ev) {
		ev.preventDefault();

		var prioridad = $(this).siblings().first().val();
		var tarea_id_attr = $(this).siblings().first().attr('id');
		var id = tarea_id_attr.substring(10, tarea_id_attr.length);

		$.ajax({
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
			url : '/tareas/prioridad/update/'+id,
			type : 'post',
			dataType : 'json',
			data : { prioridad : prioridad },
			success : function(datos) {
			}
		});
	});

	$('.btn_modificar_fase').on('click', function(ev) {
		ev.preventDefault();
		if ($('#fase').val() == "") {
			alert("Ingrese un recurso");
		}
		else {
			var fase_id_attr = $(this).parents('.contenido').attr('id');
			var id = fase_id_attr.substring(5, fase_id_attr.length);
			fase.nombre = $('#fase').val();
			fase.descripcion = $('#fase_descripcion').val();
			fase.prioridad = $('#fase_prioridad').val();

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/fases/'+id,
				type : 'put',
				dataType : 'json',
				data : fase,
				success: function(datos) {
					location.reload();
				}
			});
		}
	});

	$('.btn_eliminar_fase').on('click', function(ev) {
		
		ev.preventDefault();

		var fase_id_attr = $(this).parents('tr').attr('id');
		var id = fase_id_attr.substring(5, fase_id_attr.length);

		$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/fases/' + id,
				type : 'delete',
				dataType : 'json',
				success: function(dato) {
					location.reload();
				}
		});
	});

	$('.btn_fase_modificar_tarea').on('click', function(ev) {
		ev.preventDefault();
		if ($('#tarea').val() == "") {
			alert("Ingrese un recurso");
		}
		else {
			var tarea_id_attr = $(this).parents('tr').attr('id');
			var id = tarea_id_attr.substring(6, tarea_id_attr.length);
			tarea.nombre = $(this).parents('tr').find('#tarea_nombre').val()
			tarea.prioridad = $(this).parents('tr').find('#tarea_prioridad').val();

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/tareas/'+id,
				type : 'put',
				dataType : 'json',
				data : tarea,
				success: function(datos) {
					location.reload();
				}
			});
		}
	});

	/*
		ROLES
	 */
	
	$('#rol').keypress(function(ev) {
		if(ev.keyCode == 13){
			ev.preventDefault();
			if ($('#rol').val() == "") {
				alert("Ingrese un rol");
			}
			else {
				rol.nombre = $('#rol').val();
				$('#derecho-field').slideDown();
			}
		}
	});

	$('#derecho').keypress(function(ev) {
		if(ev.keyCode == 13){
			ev.preventDefault();
			if ($('#derecho').val() == "") {
				alert("Ingrese un derecho");
			}
			else {
				rol.descripcion = $('#derecho').val();
				$('#privilegio-field').slideDown();
			}
		}
	});

	$('#privilegio').keypress(function(ev) {
		if(ev.keyCode == 13){
			ev.preventDefault();
			if ($('#privilegio').val() == "") {
				alert("Ingrese un privilegio");
			}
			else {
				rol.privilegio = $('#privilegio').val();
				
				$.ajax({
					headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		         },
					url : '/roles',
					type : 'post',
					dataType : 'json',
					data : rol,
					success : function(datos) {
						$('#rol').val('');
						$('#derecho').val('');
						$('#privilegio').val('');
						$('#derecho-field').slideUp();
						$('#privilegio-field').slideUp();
					}
				});
			}
		}
	});

	$('.rol_agregar_tarea').on('click', function(ev) {
		ev.preventDefault();
		var rol_id_attr = $(this).parents('tr').attr('id');
		rol.rol_id = $(this).parents('tr').attr('id').substring(4, rol_id_attr.length);
		
		$('#roles').css('float', 'left');
		$('#tareas').show();
	});

	$('.agregar_a_rol').on('click', function() {
		var tarea_id_attr = $(this).parents('tr').attr('id');
		var tarea_id = $(this).parents('tr').attr('id').substring(6, tarea_id_attr.length);

		$.ajax({
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
			url : '/roles/tareas/'+rol.rol_id,
			type : 'post',
			dataType : 'json',
			data : { tarea_id : tarea_id },
			success : function(datos) {
				var fila_tarea = '<tr style="display: none;"> \
                                    <td data-label="Tarea">' + datos.nombre + '</td> \
                                </tr>';
            $('#roles').css('float', 'none');
				$(fila_tarea).appendTo($('#rol-'+rol.rol_id).find('.tablita tbody')).show('slow');
				$('#tareas').hide('slow');
			},
			error : function(jqXHR, textStatus, errorThrown) {
				alert('La tarea ya está agregada');
			}
		});
	});

	$('.btn_modificar_rol').on('click', function(ev) {
		ev.preventDefault();
		if ($('#rol').val() == "") {
			alert("Ingrese un recurso");
		}
		else {
			var rol_id_attr = $(this).parents('.contenido').attr('id');
			var id = rol_id_attr.substring(4, rol_id_attr.length);
			rol.nombre = $('#rol'). val();
			rol.descripcion = $('#rol_descripcion').val();
			rol.privilegio = $('#rol_privilegio').val();

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/roles/'+id,
				type : 'put',
				dataType : 'json',
				data : rol,
				success: function(datos) {
					location.reload();
				}
			});
		}
	});

	$('.btn_eliminar_rol').on('click', function(ev) {
		ev.preventDefault();

		var rol_id_attr = $(this).parents('tr').attr('id');
		var id = rol_id_attr.substring(4, rol_id_attr.length);

		$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/roles/' + id,
				type : 'delete',
				dataType : 'json',
				success: function(dato) {
					location.reload();
				}
		});
	});

	$("#rol_datalist").on('input', function () {
		$('#fases').html('');
		$('#tareas').html('');
		$('#actividades').html('');
		$('#recursos').html('');


		var val = this.value;
		var id 
		var encontrado = $('#roles').find('option').filter(function() {
			if (this.value.toUpperCase() === val.toUpperCase()) {

				var rol_id_attr = $('#roles').find('option[value="'+ this.value + '"]').attr('id');
				id = rol_id_attr.substring(4, rol_id_attr.length);

				return true;
			}
			return false;
		}).length;

		if(encontrado) {
			
			$.ajax({
				headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/roles/control/' + id + '/fases',
				type : 'get',
				dataType : 'json',
				success : function(datos) {
					var template = '<h1>Sin fases</h1>';

					if (datos.length > 0) {
						template = '<thead> \
							            <tr> \
							         	   <th>Fase</th> \
							            </tr> \
							         </thead> \
							         <tbody class="cuerpo">';
						datos.forEach(function (fase) {
							template += '<tr id="fase-' + fase.fase_id + '" class="fase interaccion"> \
						                    <td data-label="Fase">' + fase.nombre + '</td> \
						                </tr>'
						});
						template += '</tbody>';
					}

					$('#fases').html(template);
					$('#fases_interaccion').html(template);

					$('.fase').on('click', function(ev) {
						ev.preventDefault();
						var fase_id_attr = $(this).attr('id');
						var id = fase_id_attr.substring(5, fase_id_attr.length);
						
						$('#actividades').html('');

						$.ajax({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				         },
							url : '/fases' + '/control/' + id + '/tareas',
							type : 'get',
							dataType : 'json',
							success: function(datos) {
								var template = '<h1>Sin tareas</h1>';

								if (datos.length > 0) {
									template = '<thead> \
										            <tr> \
										         		<th>Tarea</th> \
										            </tr> \
										         </thead> \
										        	<tbody class="cuerpo">';
									datos.forEach(function (tarea) {
										template += '<tr id="tarea-' + tarea.tarea_id + '" class="tarea"> \
									                    <td data-label="Tarea">' + tarea.nombre + '</td> \
									                </tr>'
									});
									template += '</tbody>';
								}
								$('#tareas').html(template);

								$('.tarea').on('click', function(ev) {
									ev.preventDefault();
									var tarea_id_attr = $(this).attr('id');
									var id = tarea_id_attr.substring(6, tarea_id_attr.length);
									
									$('#actividades').html('');
									$('#recursos').html('');

									$.ajax({
										headers: {
											'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							         },
										url : '/tareas' + '/control/' + id + '/actividades',
										type : 'get',
										dataType : 'json',
										success: function(datos) {
											var template = '<h1>Sin actividades</h1>';

											if (datos.length > 0) {
												template = '<thead> \
													            <tr> \
													         		<th>Actividad</th> \
													            </tr> \
													         </thead> \
													        	<tbody class="cuerpo">';
												datos.forEach(function (actividad) {
													template += '<tr id="actividad-' + actividad.actividad_id + '" class="actividad"> \
												                    <td data-label="Actividad">' + actividad.nombre + '</td> \
												                </tr>'
												});
												template += '</tbody>';
											}

											$('#actividades').html(template);

											$('.actividad').on('click', function(ev) {
												ev.preventDefault();
												var actividad_id_attr = $(this).attr('id');
												var id = actividad_id_attr.substring(10, actividad_id_attr.length);
												
												$('#recursos').html('');

												$.ajax({
													headers: {
														'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
										         },
													url : '/actividades' + '/control/' + id + '/recursos',
													type : 'get',
													dataType : 'json',
													success: function(datos) {
														var template = '<h1>Sin recursos</h1>';

														if (datos.length > 0) {
															template = '<thead> \
																            <tr> \
																         		<th>Recurso</th> \
																            </tr> \
																         </thead> \
																        	<tbody class="cuerpo">';
															datos.forEach(function (recurso) {
																template += '<tr id="recurso-' + recurso.recurso_id + '" class="recurso"> \
															                    <td data-label="Recurso">' + recurso.nombre + '</td> \
															                </tr>'
															});
															template += '</tbody>';
														}
														$('#recursos').html(template);
													}
										
												});
										
											});
										
										}

									});

								});

							}
						
						});

					});

					$('.fase.interaccion').on('click', function(ev) {
						ev.preventDefault();
				
						var fase_id_attr = $(this).attr('id');
						var id = fase_id_attr.substring(5, fase_id_attr.length);

						$.ajax({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				         },
							url : '/fases' + '/control/' + id + '/tareas',
							type : 'get',
							dataType : 'json',
							success : function(datos) {
								if (datos.length > 0) {
									template = '<thead> \
										            <tr> \
										         		<th>Tarea</th> \
										         		<th>Tipo</th> \
										            </tr> \
										         </thead> \
										        	<tbody class="cuerpo">';
									datos.forEach(function (tarea) {

										var tipo = 'Aún no especificada';
										switch (tarea.tipo) {
											case 1:
												tipo = 'Secuencial';
												break;
											case 2:
												tipo = 'Paralela';
												break;
											case 3:
												tipo = 'Semi-concurrente';
												break;
											case 4:
												tipo = 'Concurrente';
												break;
										};

										template += '<tr id="tarea-' + tarea.tarea_id + '" class="tarea"> \
									                    <td data-label="Tarea">' + tarea.nombre + '</td> \
									                    <td data-label="Tarea">' + tipo + '</td> \
									                </tr>'
									});
									template += '</tbody>';
								}
								$('#tareas').html(template);
							}
						});

					});
			
				}
			
			});
	
		}
	
	});

	/*
		Interacción y Vistas
	 */

	$("#fase_datalist").on('input', function () {
		$('#tareas').html('');

		var val = this.value;
		var id;
		var encontrado = $('#fases').find('option').filter(function() {
			if (this.value.toUpperCase() === val.toUpperCase()) {

				var rol_id_attr = $('#fases').find('option[value="'+ this.value + '"]').attr('id');
				id = rol_id_attr.substring(5, rol_id_attr.length);

				return true;
			}
			return false;
		}).length;

		if(encontrado) {
			
			$('.seccion .titular').html(val);

			$.ajax({
				headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/fases/interaccion_vistas/' + id + '/tareas',
				type : 'get',
				dataType : 'json',
				success: function(datos) {

					var template = '<h1>Sin fases</h1>';
					if (datos.length > 0) {
						template = '<thead> \
							            <tr> \
							         	   <th>Tarea</th> \
							         	   <th>Tipo</th> \
							         	   <th>Interacción</th> \
							         	   <th>Vista</th> \
							            </tr> \
							         </thead> \
							         <tbody class="cuerpo">';
						$('#tareas').append(template);
						datos.forEach(function (tarea) {

							var interaccion = 'Notificación';
							var vista = 'VI';

							if (tarea.tipo != null) {
								if (tarea.tipo == 4) {
									interaccion += ' Concurrencia';
									vista += ', VP, VC';
								}
								if (tarea.tipo == 2 || tarea.tipo == 3) vista += ', VP';
							}
							else {
								interaccion = 'Establezca el tipo de tarea';
								vista = 'Establezca el tipo de tarea';
							}

							var fila = '<tr id="tarea-' + tarea.tarea_id + '" class="tarea"> \
						                    <td data-label="Tarea">' + tarea.nombre + '</td> \
						                    <td data-label="Tipo"> \
						                    		<select id="tarea_tipo"> \
									               	<option value="1">Secuencial</option> \
									               	<option value="2">Paralela</option> \
									               	<option value="3">Semi-Concurrente</option> \
									               	<option value="4">Concurrente</option> \
									            	</select> \
						                    </td> \
						                    <td id="tarea_interaccion" data-label="Interacción">' + interaccion + '</td> \
						                    <td id="tarea_vista" data-label="Vistas">' + vista + '</td> \
						                </tr>';
						   $('.cuerpo').append(fila);
						   $('#tarea_tipo').val(tarea.tipo);
						});
					}
					
					$('#tareas').append('</tbody>');
					$('.seccion').show('slow');

					$('#tarea_tipo').on('change', function(ev) {

						var tipo = $(this).val();
						var tarea_id_attr = $(this).parents('tr').attr('id');
						var id = tarea_id_attr.substring(6, tarea_id_attr.length);

						$.ajax({
							headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				         },
							url : '/tareas/tipo/update/' + id,
							type : 'post',
							dataType : 'json',
							data : { tipo: tipo },
							success: function(datos) {
								var interaccion = 'Notificación';
								var vista = 'VI';

								if (datos.tipo == 4) {
									interaccion += ' Concurrencia';
									vista += ', VP, VC';
								}
								if (datos.tipo == 2 || datos.tipo == 3) vista += ', VP';

								tarea = $('#tarea-' + datos.tarea_id);
								tarea.find('#tarea_interaccion').html(interaccion);
								tarea.find('#tarea_vista').html(vista);
							}
						});

					});
				}
			});

		}
	});

	$('#tipo_datalist').on('input', function() {
		$('#tareas').html('');

		var val = this.value;
		var id;
		var encontrado = $('#tipos').find('option').filter(function() {
			if (this.value.toUpperCase() === val.toUpperCase()) {

				var rol_id_attr = $('#tipos').find('option[value="'+ this.value + '"]').attr('id');
				id = rol_id_attr.substring(5, rol_id_attr.length);

				return true;
			}
			return false;
		}).length;

		if(encontrado) {
			
			$.ajax({
				headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/tareas/interaccion_vistas/tipo',
				type : 'get',
				dataType : 'json',
				success: function(datos) {
					var template = '<h1>Sin Tareas</h1>';
					if (datos.length > 0) {
						template = '<thead> \
							            <tr> \
							         	   <th>Tarea</th> \
							            </tr> \
							         </thead> \
							         <tbody class="cuerpo">';
						datos.forEach(function (tarea) {
							template += '<tr id="tarea-' + tarea.tarea_id + '" class="tarea"> \
						                    <td data-label="Tarea">' + tarea.nombre + '</td> \
						                </tr>'
						});
						template += '</tbody>';
					}
					
					$('#tareas').html(template);

					$('.tarea').on('click', function() {
						$('#fases').html('');
						$('#roles').html('');

						var tarea_id_attr = $(this).attr('id');
						id = tarea_id_attr.substring(6, tarea_id_attr.length);

						$.ajax({
							headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				         },
							url : '/tareas/interaccion_vistas/' + id + '/fases',
							type : 'get',
							dataType : 'json',
							success: function(datos) {
								var template = '<h1>Sin Fases</h1>';
								if (datos.length > 0) {
									template = '<thead> \
										            <tr> \
										         	   <th>Fase</th> \
										            </tr> \
										         </thead> \
										         <tbody class="cuerpo">';
									datos.forEach(function (fase) {
										template += '<tr id="fase-' + fase.fase_id + '" class="fase"> \
									                    <td data-label="Fase">' + fase.nombre + '</td> \
									                </tr>'
									});
									template += '</tbody>';
								}

								$('#fases').html(template);

								$('.fase').on('click', function() {
									$('#roles').html('');

									var fase_id_attr = $(this).attr('id');
									id = fase_id_attr.substring(5, fase_id_attr.length);

									$.ajax({
										headers: {
							            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							         },
										url : '/fases/interaccion_vistas/' + id + '/roles',
										type : 'get',
										dataType : 'json',
										success: function(datos) {
											var template = '<h1>Sin Roles</h1>';
											if (datos.length > 0) {
												template = '<thead> \
													            <tr> \
													         	   <th>Rol</th> \
													            </tr> \
													         </thead> \
													         <tbody class="cuerpo">';
												datos.forEach(function (rol) {
													template += '<tr id="rol-' + rol.rol_id + '" class="rol"> \
												                    <td data-label="Rol">' + rol.nombre + '</td> \
												                </tr>'
												});
												template += '</tbody>';
											}

											$('#roles').html(template);
										}
									});

								});
							}
						});

					});

				}
			});

		}
	})

	$('#recurso_datalist').on('input', function() {
		$('#actividades').html('');

		var val = this.value;
		var id;
		var encontrado = $('#recursos').find('option').filter(function() {
			if (this.value.toUpperCase() === val.toUpperCase()) {

				var recurso_id_attr = $('#recursos').find('option[value="'+ this.value + '"]').attr('id');
				id = recurso_id_attr.substring(8, recurso_id_attr.length);

				return true;
			}
			return false;
		}).length;

		if(encontrado) {
			$.ajax({
				headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	         },
				url : '/recursos/interaccion_vistas/' + id + '/actividades',
				type : 'get',
				dataType : 'json',
				success: function(datos) {
					var template = '<h1>Sin Actividades</h1>';
					if (datos.length > 0) {
						template = '<thead> \
							            <tr> \
							         	   <th>Actividad</th> \
							            </tr> \
							         </thead> \
							         <tbody class="cuerpo">';
						datos.forEach(function (actividad) {
							template += '<tr id="actividad-' + actividad.actividad_id + '" class="actividad"> \
						                    <td data-label="Actividad">' + actividad.nombre + '</td> \
						                </tr>'
						});
						template += '</tbody>';
					}
					
					$('#actividades').html(template);

					$('.actividad').on('click', function() {
						$('#tareas').html('');
						$('#fases').html('');
						$('#roles').html('');

						var actividad_id_attr = $(this).attr('id');
						id = actividad_id_attr.substring(10, actividad_id_attr.length);

						$.ajax({
							headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				         },
							url : '/actividades/interaccion_vistas/' + id + '/tareas',
							type : 'get',
							dataType : 'json',
							success: function(tarea) {
								var template = '<h1>Sin Tarea</h1>';
								if (tarea != null) {
									template = '<thead> \
										            <tr> \
										         	   <th>Tarea</th> \
										            </tr> \
										         </thead> \
										         <tbody class="cuerpo"> \
										         <tr id="tarea-' + tarea.tarea_id + '" class="tarea"> \
									                    <td data-label="Tarea">' + tarea.nombre + '</td> \
									                </tr>';
									template += '</tbody>';
								}

								$('#tareas').html(template);

								$('.tarea').on('click', function() {
									$('#fases').html('');
									$('#roles').html('');

									var tarea_id_attr = $(this).attr('id');
									id = tarea_id_attr.substring(6, tarea_id_attr.length);

									$.ajax({
										headers: {
							            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							         },
										url : '/tareas/interaccion_vistas/' + id + '/fases',
										type : 'get',
										dataType : 'json',
										success: function(datos) {
											var template = '<h1>Sin Fases</h1>';
											if (datos.length > 0) {
												template = '<thead> \
													            <tr> \
													         	   <th>Fase</th> \
													            </tr> \
													         </thead> \
													         <tbody class="cuerpo">';
												datos.forEach(function (fase) {
													template += '<tr id="fase-' + fase.fase_id + '" class="fase"> \
												                    <td data-label="Fase">' + fase.nombre + '</td> \
												                </tr>'
												});
												template += '</tbody>';
											}

											$('#fases').html(template);

											$('.fase').on('click', function() {
												$('#roles').html('');

												var fase_id_attr = $(this).attr('id');
												id = fase_id_attr.substring(5, fase_id_attr.length);

												$.ajax({
													headers: {
										            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
										         },
													url : '/fases/interaccion_vistas/' + id + '/roles',
													type : 'get',
													dataType : 'json',
													success: function(datos) {
														var template = '<h1>Sin Roles</h1>';
														if (datos.length > 0) {
															template = '<thead> \
																            <tr> \
																         	   <th>Rol</th> \
																            </tr> \
																         </thead> \
																         <tbody class="cuerpo">';
															datos.forEach(function (rol) {
																template += '<tr id="rol-' + rol.rol_id + '" class="rol"> \
															                    <td data-label="Rol">' + rol.nombre + '</td> \
															                </tr>'
															});
															template += '</tbody>';
														}

														$('#roles').html(template);
													}
												});
											});
										}
									});

								});
							}
						});

					});

				}
			});

		}
	})

});
