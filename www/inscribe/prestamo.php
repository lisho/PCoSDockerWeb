<!DOCTYPE html>
<html lang="es">
<?php $_POST = array(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorizo el uso de datos</title>
    <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="fontawesome-free-5.13.0-web/css/fontawesome.min.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/css/brands.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/css/solid.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/css/regular.css" rel="stylesheet">
    <link href="form.css" rel="stylesheet">
    <script src="jquery-3.5.0.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row">      
        <div class="col-md-8 mx-auto">
            <div class="myform form " id="inicio_myform">
                <h2 class="wv-heading--subtitle text-center">
                    DOCUMENTO DE PRÉSTAMO
                </h2>

                <form action="pdf-equipamiento.php" method="post" name="formulario" autocomplete="nope" id="aus-form" enctype="multipart/form-data" >
                    <div class="card-body text-secondary">

                        <!-- Datos identificativos -->

                        <div class="form-group">
                            <label for="nombre" class="oculto">Nombre</label>
                            <input type="text" name="nombre"  class="form-control my-input text_input" id="nombre" placeholder="Nombre" required onkeyup="ponerEnMayusculas(this);">
                        </div>

                        <div class="form-group">
                            <label for="apellido1" class="oculto">Primer apellido</label>
                            <input type="text" name="apellido1"  class="form-control my-input text_input" id="apellido1" placeholder="Primer apellido" required onkeyup="ponerEnMayusculas(this);">
                        </div>

                        <div class="form-group">
                            <label for="apellido2" class="oculto">Segundo apellido</label>
                            <input type="text" name="apellido2"  class="form-control my-input segundo_apellido" id="apellido2" placeholder="Segundo apellido" onkeyup="ponerEnMayusculas(this);">
                            <div class="warning_alert"></div>

                        </div>

                        <div class="form-group">

                            <label for="dni" class="oculto">Documento de identidad (DNI/NIE)</label>
                            <input type="text" name="dni"  class="form-control my-input dni_input" id="dni" placeholder="DNI/NIE" required onkeyup="ponerEnMayusculas(this);">
                            <div class="invalid_alert"></div>
                            
                        </div>

                        <div class="form-group">
                        He recibido el siguiente equipamiento para su utilización en el marco de mi labor profesional
                            <label for="equipamiento" class="oculto">He recibido el siguiente equipamiento para su utilización en el marco de mi labor profesional</label>
                            <textarea  name="equipamiento"  class="form-control" id="equipamiento" placeholder="Descripción del equipamiento..." required onkeyup="ponerEnMayusculas(this);"></textarea>
                            <div class="invalid_alert"></div>
                            
                        </div>
                        
                        <!-- Firma -->

                        <?php include_once("firma_pruebas.php"); ?>

                         <!-- Botón enviar -->

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="text-center ">
                               
                                <!-- Boton real SUBMIT-->                                        
                                <button type="submit" id="pulsar_enviar_btn" class=" btn btn-block send-button btn-success btn-lg tx-tfm" ><i class="fas fa-send fa-2x"></i><p>Aceptar y enviar</p>    </button>

                                </div>              
                            </div> 
                        </div>
                    </div>

                    <p class="small mt-3">Desarrollado en el marco del proyecto <a href="#" class="ps-hero__content__link">Puertas Digitales</a> del <a href="#">Excmo. Ayuntamiento de León</a>.
                    </p>

                </form>
            </div>
        </div>
    </div>


    <!-- Scripts JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
    <script src="validar_formulario.js"></script>

    <script>

        $( document ).ready(function() {

             /* Manejador del SUBMIT */

             $("#pulsar_enviar_btn").click(function(event) {
                
                console.log($("#aus-form").is(":valid"));
                
            
                if ($("#aus-form").is(":valid")) {
                    event.preventDefault();
                    pulsarSubmitPrestamo();
                   
                }

            });

            /** Gestión de las labels y placeholders de los campos  */

            $(".section").on("focus", "input, select", (e) => {

               /*  if ($.inArray("datepicker", e.target.classList)) {
                        
                    lanza_datepicker(e);
                    $(e.target).change(function(event) {
                        
                        $("label[for='" + e.target.name + "']")
                        .fadeIn("10000")
                        .addClass("visto")
                        
                    });

                } else {  
                   
                } */

                gestiona_labels(e);
            });


        }); /**--> END READY */

        /** PANEL DE FIRMA */

        function f() {
            var data = signaturePad.toDataURL('image/png');
            document.formulario.firma.value = data;
           
        }

        function gestiona_labels(e) { 

            $("input, select").focus(function(e) {
                
                let label; var campo; var placeholder;

                label = $("label[for='" + e.target.name + "']");
                campo =  $(this);
                placeholder = $(this).attr('placeholder')
                campo.removeAttr("placeholder");

                label.fadeIn("10000");
                label.addClass("visto");

            
                
                $("input, select").blur(function (e) { 
                                    
                    let label;
                    label = $("label[for='" + e.target.name + "']");

                    $(this).attr("placeholder", placeholder);

                    if ($(this).val().length <= 0 || $(this).val() == "Estado Civil...") {
                    
                        label.fadeOut("10000");
                                            
                    }             
                });   

         
            });
        }


    </script>
</body>
</html>