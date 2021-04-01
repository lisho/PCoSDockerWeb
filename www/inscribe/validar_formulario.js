
	/* const namePattern = /^[a-z A-Z]{1,30}$|^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$/i; */
	const namePattern = /^[*]{1,70}$|$/i;
	
	const dniPattern = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}|^[XxTtYyZz]{1}[0-9]{7}[a-zA-Z]{1}$/i;
	const direccionPattern=  /^[*]{1,70}$|$/i;
	const telefonoPattern = /^[0-9]{9}(-[0-9]{9}){0,3}$/i;
	const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/i;

	const monedaPattern = /^[\d\.\,]+$/i;
	
	const IBANPattern = /^ES\d{2}[ -]\d{4}[ -]\d{4}[ -]\d{4}[ -]\d{4}[ -]\d{4}|ES\d{22}$/i;
	const fechaPattern = /^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/;
	
$(document).ready(function() {

	/* Validando solicitante*/

	$("#aus-form").on('change keyup', 'input, select', function(e) {
		
		event.preventDefault();
	
		if ($(e.target).hasClass('text_input')) {
			//console.log($(e.target).val())
			
			checkInput(e.target, namePattern);
		}

		if ($(e.target).hasClass('segundo_apellido')) {

			checkInput(e.target, namePattern, "", "Este campo no es obligatorio pero, si es posible, es conveniente rellenarlo");
		}

		if ($("#pasaporte").is(":checked")) {

			var objeto = $("#dni");
			$("#dni").prop('placeholder', 'Pasaporte');
			$("label[for=dni]").html("Pasaporte");
			checkInput(objeto[0], direccionPattern);
			$("#dni").next(".invalid_alert").hide()

		} else {

			var objeto = $("#dni");
			$("#dni").prop('placeholder', 'DNI/NIE');
			$("label[for=dni]").html("Documento de identidad (DNI/NIE)");
			var feedback ="Por favor, revisa el DNI/NIE";
			checkInput(objeto[0], dniPattern, feedback);
			//$("#dni").next(".invalid_alert").hide()

			if ($(e.target).hasClass('dni_input')) {


				if ( $("#pasaporte").is(":checked") && $(e.target).has("#dni")) {
	
					checkInput(e.target, direccionPattern, feedback);
					
				}else{
	
					var feedback ="Por favor, revisa el DNI/NIE";
	
					checkInput(e.target, dniPattern, feedback);
				}
			}

		}

		if ($(e.target).hasClass('direccion_input')) {

			var feedback ="Por favor, revisa la dirección";

			checkInput(e.target, direccionPattern, feedback);
		}
		
		if ($(e.target).hasClass('email_input')) {

			if (e.target.value == "") {
				
				$("#notifica_mail").prop({	disabled:true,
											checked: false,
										});
				$("label[for=notifica_mail]").addClass('disabled');
			
			}else {
				
				$("#notifica_mail").prop('disabled',false);
				$("label[for=notifica_mail]").removeClass('disabled');

			}
			
			checkInput(e.target, emailPattern, "", "Este campo no es obligatorio, pero es necesario si deseas recibir notificaciones por email");
				
		}
		
		if ($(e.target).hasClass('telefono_input')) {

			checkInput(e.target, telefonoPattern);
			
			/* Comprobamos el email y si esta vacio pintamos el campo email con warning*/
			if ($("#email").val() == "" ){
				checkInput($("#email")[0], emailPattern, "", "Este campo no es obligatorio, pero es necesario si deseas recibir notificaciones por email");
			}
		}

		if ($(e.target).hasClass('fecha_input')) {

			var num_familiar = e.target.id.slice(-1);
			var check = checkMayorEdad(e.target);
			
			checkInput(e.target, fechaPattern);
						
			
			if (check) {
				
				$("#autorizo_laboral"+num_familiar).parent("div").show().removeClass('oculto');
				$("#autorizo_laboral"+num_familiar).prop('required',true);
			
			} else {

				$("#autorizo_laboral"+num_familiar).parent("div").hide().addClass('oculto');
				$("#autorizo_laboral"+num_familiar).prop({
														required: false,
														checked: false,
													});

				/* Comprobamos el estado del checkbox y asignamos el icono en la vista previa*/
				if ($("#autorizo_laboral"+num_familiar).is(":checked")) {
					var checkeado = "fa-check-square";
				} else {
					var checkeado = "fa-square";
				}
				/** Pintamos el check en ña vista previa en el estado que esté cuando lo ocultamos ... Deberia estar desmarcado*/
				$("#autorizo"+num_familiar+"_vista").html("<small><i class= 'far "+checkeado+"'></i>  AUTORIZO a recabar los datos referentes a mi capacidad económica</small>")
				
			}

		}
		
		if ($(e.target).hasClass('select_input')) {

			checkSelect(e.target);

			if (e.target.id == "cp") {checkInput($("#ciudad"), namePattern);}
		}

		if ($(e.target).hasClass('ingresos_input')) {

			checkInput(e.target, monedaPattern);
		}

		if ($(e.target).hasClass('cuenta_input')) {

			var feedback ="Si tienes problemas con el nº de cuenta y prueba a no utilizar ni espacios ni guiones. El formato correcto se compone de <b>ES</b> seguido de <b>22 dígitos</b>";
			//if(e.type == "change"){
				checkInput(e.target, IBANPattern, feedback);
			//}
			
		}

		if (e.target.name == "notificaciones" && e.target.checked) {
			
			$("#opciones_notificacion").removeClass('invalid_alert').children('h5').hide();
		}

		if (e.target.id == "archivo0" && e.target.value!="") {
		
			$("#aus-form > div:nth-child(11) > div").removeClass('invalid_alert').children('h5').hide();

		}

	});

});

 
function checkInput(input, pattern, feedback, feedback2) {
	
	var idInput = input.id;
	var cadena = $("#"+idInput).val();

	$("label[for="+idInput+"]").addClass('no_valid_feedback').removeClass('valid_feedback').show();
	
	if (pattern.test(cadena) || (idInput == "dni" && $("#pasaporte").is(":checked"))) {

		$(input).addClass('valid_input').removeClass('no_valid_input alert_input');
		$("label[for="+idInput+"]").addClass('valid_feedback').removeClass('no_valid_feedback alert_feedback');
		if (feedback) {$(input).next(".invalid_alert").hide()};
		if (feedback2) {$(input).next(".warning_alert").hide()};
		return true;
	
	}else {

		if ((idInput == "email" && cadena == "")) {
			$(input).addClass('alert_input').removeClass('valid_input no_valid_input');
			$("label[for="+idInput+"]").addClass('alert_feedback').removeClass('no_valid_feedback valid_feedback');
			if (feedback2) {$(input).next(".warning_alert").show()
									.removeClass("invalid_alert")
									.addClass('warning_alert')
									.html(feedback2)}

		}else if (idInput == "apellido2"){

			$(input).addClass('alert_input').removeClass('valid_input no_valid_input');
			$("label[for="+idInput+"]").addClass('alert_feedback').removeClass('no_valid_feedback valid_feedback');
			if (feedback2) {$(input).next(".warning_alert").show()
									.removeClass("invalid_alert")
									.addClass('warning_alert')
									.html(feedback2)}	


		}else{

			
			$(input).addClass('no_valid_input').removeClass('valid_input alert_input');
			$("label[for="+idInput+"]").addClass('no_valid_feedback alert_feedback').removeClass('valid_feedback alert_feedback');
			if (feedback) {$(input).next(".invalid_alert").show().html(feedback)}
			if (feedback2) {$(input).next(".warning_alert").show()
										.removeClass("invalid_alert")
										.addClass('warning_alert')
										.html(feedback2)}	
		}
	}
}

function checkSelect(select, num_familiar) {

	var idSelect = select.id;

	if ($(select).value=!"") {

		$(select).addClass('valid_input').removeClass('no_valid_input');
		$("label[for="+idSelect+"]").addClass('valid_feedback').removeClass('no_valid_feedback');

	}else {

		$(select).addClass('no_valid_input').removeClass('valid_input');
		$("label[for="+idSelect+"]").addClass('no_valid_feedback').removeClass('valid_feedback');
	}

}

function checkMayorEdad (fecha) {
			
            var value = $(fecha).val();
            var fechanacimiento = moment(value, "DD-MM-YYYY");
          
            if(!fechanacimiento.isValid())
                return false;

            var years = moment().diff(fechanacimiento, 'years');
          
            return years > 18;
               
        }

function checkNotificaciones(argument) {
	
    goToId("info_notificacion_btn");
    $("#opciones_notificacion").addClass('invalid_alert').children('h5').show();

}

function checkArchivos(argument) {
	
    goToId("info_archivos_btn");
    $("#aus-form > div:nth-child(11) > div.card-body.text-secondary").addClass('invalid_alert').children('h5').show();

}

function checkFirma(argument) {
	
    goToId("info_firmar_btn");
    $("#aus-form > div:nth-child(19) > div.card-body.text-secondary").addClass('invalid_alert').children('h5').show();

     $("#signature-pad").click(function(event) {
         
         if (signaturePad._data.length > 0) {
         	    $("#aus-form > div:nth-child(19) > div.card-body.text-secondary").removeClass('invalid_alert').children('h5').hide();
         }

    }); 
}


function ponerEnMayusculas(e) {
	
	e.value = e.value.toUpperCase();
}


function pulsarSubmit(){

		let objeto = $("#dni");
		let o = objeto[0];
	
		console.log($("#pasaporte").is(':checked'));

    if ($("input[name=notificaciones]").is(":checked") &&
    	(checkInput(($("#dni"))[0], dniPattern) || $("#pasaporte").is(':checked')) &&
        $("#archivo0").val() != "" &&
		signaturePad._data.length > 0 ) 
		{
			swal({
				title: `¿Realmente desea enviar su solicitud?`,
				text: `Asegúrese de que los datos indicados son correctos. 
				Si no está seguro, pulse cancelar y luego pulse en el botón vista previa para comprobarlos. 
				Una vez enviada la declaración podrá descargarla en formato PDF. `,
				icon: "warning",
				buttons: {
					cancel: "Cancelar",
					catch: {
						text: "Enviar",
						value: "catch",
					},	
				},
			})
			.then((value) => {
				switch (value) {
					
				  	case "catch":
					
						f();
						//$("#aus-form").submit();

						var form = $('#aus-form')[0];

						// Create an FormData object
						var data = new FormData(form);
				
						$.ajax({
							type: "POST",
							enctype: 'multipart/form-data',
							url: "pdf.php",
							data: data,
							processData: false,
							contentType: false,
							cache: false,
							beforeSend: ()=> $('.loading').removeClass("no-show").addClass("show"),
							
							success: function (resp) {
								$('.loading').removeClass("show").addClass("no-show");
								swal({title : "Correcto!", 
									text : "Solicitud enviada...", 
									icon : "success",
									buttons : {
										ver_pdf: {
											text: "Descargar solicitud",
											value: "descargar",
										},
										cerrar: {
											text: "Salir",
											value: "cerrar",
										},	
									}
								}).then((value) =>{
									
									switch (value) {
			   
										case "descargar":
											
											document.getElementById("aus-form").action = "pdf_ver.php";
											$("#aus-form").submit();
											
											break;

										case "cerrar":
											
											window.location.href = "https://puertasdigitales.es/aus/";
											break;
									}
									
								});
							
							},
							error: function (e) {
								
								console.log("ERROR : ", e);
							}
						});

						break;
			   
				  	default:
						swal.close();
				}
			});
        }

    else {
				
        if ($("input[name=notificaciones]").is(":checked") == false) {
            console.log("no esta checked")
            checkNotificaciones();
        } else if (!checkInput(objeto[0], dniPattern)){
        	goToId("pasaporte");
        }else if ($("#archivo0").val() == "") {
            checkArchivos();
        } else if (signaturePad._data.length == 0) {
            checkFirma();
        }else if ($("#aus-form").is(":invalid")) {
			console.log("Formnulario inválido");			
		}
    }
}
