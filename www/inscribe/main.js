
/**    VALIDACIONES DE LOS INPUTS   **/

	const namePattern = /^[a-z A-Z]{1,30}$|^([A-Z]{1}[a-zñäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ]+[\s]*)+$/i;
	const dniPattern = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}|^[XxTtYyZz]{1}[0-9]{7}[a-zA-Z]{1}$/i;
	/* const direccionPattern=  /^[*]{1,70}$|$/i; */
	const direccionPattern=  /^[*]{1,70}$|$/i;
	const telefonoPattern = /^[0-9]{9}(-[0-9]{9}){0,3}$/i;
	const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/i;

	const monedaPattern = /^[\d\.\,]+$/i;
	
	const IBANPattern = /^ES\d{2}[ -]\d{4}[ -]\d{4}[ -]\d{4}[ -]\d{4}[ -]\d{4}|ES\d{22}$/i;
	const fechaPattern = /^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/;
	
$(document).ready(function() {

	/* Validando solicitante*/

	$("#aus-form").on('change keyup', 'input, select', function(e) {
		
		e.preventDefault();
	
		if ($(e.target).hasClass('text_input')) {
			//console.log($(e.target).val())
			
			checkInput(e.target, namePattern);
		}

		if ($(e.target).hasClass('segundo_apellido')) {

			checkInput(e.target, namePattern, "", "Este campo no es obligatorio pero, si es posible, es conveniente rellenarlo");
		}

		if ($(e.target).hasClass('select_input')) {

			checkSelect(e.target);
		}

		if ($(e.target).hasClass('email_input')) {

			checkInput(e.target, emailPattern);
		}

		if ($(e.target).hasClass('direccion_input')) {

			checkInput(e.target, direccionPattern);
		}

		var objeto = $("#dni");
		/* $("#dni").prop('placeholder', 'DNI/NIE'); */
		
		//$("#dni").next(".invalid_alert").hide()

		if ($(e.target).hasClass('dni_input')) {

			/* $("label[for=dni]").html("Documento de identidad (DNI/NIE)").addClass("oculto"); */
			var feedback ="Por favor, revisa el DNI/NIE";
			checkInput(objeto[0], dniPattern, feedback);

				var feedback ="Por favor, revisa el DNI/NIE";

				checkInput(e.target, dniPattern, feedback);

		}

	});

	setTimeout( ()=> {
		$('#flecha_directa').fadeIn('slow');
	}, 4500)

});

 
 function checkInput(input, pattern, feedback, feedback2) {
	
	var idInput = input.id;
	var cadena = $("#"+idInput).val();

	/* $("label[for="+idInput+"]").addClass('no_valid_feedback').removeClass('valid_feedback').show(); */
	
	if (pattern.test(cadena)) {

		$(input).addClass('valid_input').removeClass('no_valid_input alert_input');
		/* $("label[for="+idInput+"]").addClass('valid_feedback').removeClass('no_valid_feedback alert_feedback'); */
		if (feedback) {$(input).next(".invalid_alert").hide()};
		if (feedback2) {$(input).next(".warning_alert").hide()};
		return true;
	
	}else {

		if ((idInput == "email" && cadena == "")) {
			$(input).addClass('alert_input').removeClass('valid_input no_valid_input');
			/* $("label[for="+idInput+"]").addClass('alert_feedback').removeClass('no_valid_feedback valid_feedback'); */
			/* if (feedback2) {$(input).next(".warning_alert").show()
									.removeClass("invalid_alert")
									.addClass('warning_alert')
									.html(feedback2)} */

		}else if (idInput == "apellido2"){

			$(input).addClass('alert_input').removeClass('valid_input no_valid_input');
			/* $("label[for="+idInput+"]").addClass('alert_feedback').removeClass('no_valid_feedback valid_feedback'); */
			if (feedback2) {$(input).next(".warning_alert").show()
									.removeClass("invalid_alert")
									.addClass('warning_alert')
									.html(feedback2)}	


		}else{

			
			$(input).addClass('no_valid_input').removeClass('valid_input alert_input');
			/* $("label[for="+idInput+"]").addClass('no_valid_feedback alert_feedback').removeClass('valid_feedback alert_feedback'); */
			if (feedback) {$(input).next(".invalid_alert").show().html(feedback)}
			if (feedback2) {$(input).next(".warning_alert").show()
										.removeClass("invalid_alert")
										.addClass('warning_alert')
										.html(feedback2)}	
		}
	}
} 

function checkSelect (select){
	var idInput = select.id;
	var cadena = $("#"+idInput).val();
	if (cadena.length > 0) $(select).addClass('valid_input').removeClass('no_valid_input alert_input');
	
}

function checkFirma(argument) {
	
    //goToId("info_firmar_btn");
    $("#aus-form > div > div.cristal > div:nth-child(15) > div.card-body.text-secondary").addClass('invalid_alert').children('h5').show();

    $("#signature-pad").click(function(event) {
         
         if (signaturePad._data.length > 0) {
         	    $("#aus-form > div:nth-child(15) > div.card-body.text-secondary").removeClass('invalid_alert').children('h5').hide();
         }

    }); 
}

function pulsarSubmit(){

		let objeto = $("#dni");
		let o = objeto[0];
	
		

    if (signaturePad._data.length > 0 ) 
		{
			swal({
				title: `¿Realmente desea enviar su solicitud?`,
				text: `Asegúrese de que los datos indicados son correctos. 
				Si no está seguro, pulse cancelar y compruebelos. 
				Una vez enviada la solicitud podrá descargarla en formato PDF. `,
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
						
            			document.getElementById("caja_enviando").classList.remove("oculto");

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
							/* beforeSend: ()=> $('.loading').removeClass("no-show").addClass("show"), */
							
							success: function (resp) {
								/* $('.loading').removeClass("show").addClass("no-show"); */
								document.getElementById("caja_enviando").classList.toggle("caja_enviando_2");
								swal({title : "Correcto!", 
									text : "Solicitud enviada...", 
									icon : "success",
									buttons : {
										ver_pdf: {
											text: "Descargar justificante",
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
											
											document.getElementById("aus-form").action = "pdf_descargar.php";
											$("#aus-form").submit();
											
											break;

										case "cerrar":
											
											window.location.href = "https://puertasdigitales.es/inscribe/";
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
				
         if (signaturePad._data.length == 0) {
            checkFirma();
        }else if ($("#aus-form").is(":invalid")) {
			console.log("Formnulario inválido");			
		}
    }
}
