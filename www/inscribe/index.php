<!DOCTYPE html>
<html lang="es">
<?php $_POST = array(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incripción en la actividad de acompañamiento digital</title>
    <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="fontawesome-free-5.13.0-web/css/fontawesome.min.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/css/brands.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/css/solid.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/css/regular.css" rel="stylesheet">
    <link href="form.css" rel="stylesheet">
    <link rel="stylesheet" href="./preloader/preloader.css">
    <script src="jquery-3.5.0.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
</head>
<body onload="resetea()">
    <?php include_once("./preloader/preloader.php"); ?>
    <div id="caja_enviando" class="caja_enviando oculto">
        <div>
            <div class="loader_enviando"></div>
        </div>
       
    </div>
    
    <div id="container_principal" class="container oculto">
        
        <div class="row">   
            
            <div class="col-md-8 mx-auto">
                <div class="myform form " id="inicio_myform">
                    
                    <form action="pdf.php" method="post" name="formulario" autocomplete="nope" id="aus-form" enctype="multipart/form-data" >
                       
                            <div class="container_logo"><img id="logo_principal" src="./img/logo_ayto_1.svg" alt=""></div>
                            
                            <h3 class="wv-heading--subtitle text-center color_blanco">Proyecto de apoyo para el acceso a la administración 
                                electrónica y reducción de la brecha digital
                            </h3>
                            <div id="boton_leer_proyecto" class="col text-right">
                                <p>
                                    <span data-toggle="modal" data-target="#info_proyecto" class=""><i id="info_autorizo_btn" type="button" class="fas fa-question-circle btn btn-cristal">     
                                        Leer más ...</i></span>
                                </p>
                            </div>
                            <a href="#formulario_cristal"><img id="flecha_directa" src="./img/flecha_directa.svg" alt=""></a>
                            
                            <hr class="linea_blanca">
                            <p class="parrafo justificado">
                                              Resulta evidente que la implantación de procesos digitales para realizar gestiones y acceder a servicios (administración digital, por ejemplo) ya es una realidad. Estos trámites digitales, 
                                no sólo son más simples, rápidos y baratos, sino que en algunas ocasiones sustituyen completamente a los procesos presenciales, complicando o dejando sin posibilidad 
                                de acceso a las personas que no disponen de las competencias más básicas para realizarlos. Por ello, y con la firme intención de contribuir a la reducción de la brecha digital, 
                                tanto de acceso como de uso, y especialmente en el caso de las personas con más dificultades, el Ayuntamiento de León pone en marcha las acciones de 

                            </p>
                            <p id="actividad" class="wv-heading--subtitle text-center color_blanco">ACOMPAÑAMIENTO DIGITAL Y CAPACITACIÓN PARA EL ACCESO A LA ADMINISTRACIÓN ELECTRÓNICA</p>
                            <div id="boton_leer_actividad" class="col text-right">
                                <p>
                                    <span data-toggle="modal" data-target="#info_actividad" class=""><i id="info_autorizo_btn" type="button" class="fas fa-question-circle btn btn-cristal">     Leer más...</i></span>
                                </p>
                            </div>
                            <span style="color: rgb(128, 162, 163);">(*) Campo obligatorio</span>
                            <!-- Datos identificativos -->
                            
                            <div id="formulario_cristal" class="cristal">
                                <h2 id="titulo_solicitud" class="wv-heading--subtitle text-center">SOLICITUD DE INSCRIPCIÓN</h2>
                                <div class="form-group aparece oculto2">
                                    <!-- <label for="nombre" class="oculto">Nombre</label> -->
                                    <input type="text" name="nombre"  class="form-control my-input text_input" id="nombre" placeholder="Nombre (*)" required >
                                </div>

                                <div class="form-group aparece oculto2">
                                    <!-- <label for="apellido1" class="oculto">Primer apellido</label> -->
                                    <input type="text" name="apellido1"  class="form-control my-input text_input" id="apellido1" placeholder="Primer apellido (*)" required >
                                </div>

                                <div class="form-group aparece oculto2">
                                    <!-- <label for="apellido2" class="oculto">Segundo apellido</label> -->
                                    <input type="text" name="apellido2"  class="form-control my-input segundo_apellido" id="apellido2" placeholder="Segundo apellido" >
                                    <div class="warning_alert"></div>
                                </div>

                                <div class="form-group aparece oculto2">
                                    <!-- <label for="dni" class="oculto">Documento de identidad (DNI/NIE)</label> -->
                                    <input type="text" name="dni"  class="form-control my-input dni_input" id="dni" placeholder="DNI/NIE (*)" required >
                                    <div class="invalid_alert"></div>
                                </div>

                                <div class="form-group aparece oculto2">
                                    <!-- <label for="direccion" class="oculto">Dirección</label> -->
                                    <div class="input-group">   
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="direccion_sign"><i class="fas fa-home"></i></div>
                                        </div>
                                        <input type="text" name="direccion"  class="form-control my-input direccion_input text_input" id="direccion" placeholder="Dirección (*)" required >
                                    </div>
                                </div>

                                <div class="row form-group aparece oculto2">
                                    <div class="col">
                                        <!-- <label for="cp" class="oculto">Código Postal</label> -->
                                        <select id="cp" class="form-control my-input select_input" name="cp" placeholder="Código Postal (*)" required>
                                            <option value="" selected >Código Postal... (*)</option>
                                            <option>24001</option>
                                            <option>24002</option>
                                            <option>24003</option>
                                            <option>24004</option>
                                            <option>24005</option>
                                            <option>24006</option>
                                            <option>24007</option>
                                            <option>24008</option>
                                            <option>24009</option>
                                            <option>24010</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group aparece oculto2">
                                    <!-- <label for="email"  class="oculto">Correo electrónico</label> -->
                                    <div class="input-group">   
                                        <div class="input-group-prepend">
                                            <div class="input-group-text email_input" id="mail_sign">@</div>
                                        </div>
                                            <input type="email" name="email"  class="form-control my-input email_input" id="email" placeholder="Correo electrónico" aria-describedby="btnGroupAddon2">
                                        <div class="warning_alert"></div>
                                    </div>
                                </div>

                                <div class="form-group aparece oculto2">
                                    <!-- <label for="phone"  class="oculto">Número de teléfono</label> -->
                                    <div class="input-group">   
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="btphone_sign"><i class="fas fa-phone"></i></div>
                                        </div>
                                        <input type="number" min="0" name="phone" id="phone"  class="form-control my-input telefono_input" placeholder="Teléfono (*)" required>
                                    </div>
                                    
                                </div>
                            
                                <!-- Autorizaciones y declaraciones -->                            
                                
                                <div class="card border-secondary section">
                                    
                                    <div class="card-body text-white bg-secondary" id="check_declaraciones">
                                        
                                        <div id="boton_leer_proyecto" class="text-center">
                                            <p>
                                                <span data-toggle="modal" data-target="#info_autorizo" class="">
                                                    <i id="info_autorizo_btn" type="button" class="fas fa-question-circle btn btn-cristal">     
                                                        Leer cláusula de protección de datos</i></span>
                                            </p>
                                        </div>

                                        <!-- <div id="boton_leer text-center" class="col text-center">
                                            <p ><span data-toggle="modal" data-target="#info_autorizo" class="">
                                                <i id="info_autorizo_btn" type="button" class="fas fa-question-circle btn btn-info boton_help animated flash">     
                                                    Lee el texto completo
                                                </i>
                                            </span></p>
                                        </div> -->

                                        <div class="form-group">
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="leido" name="leido" required>
                                            <label class="form-check-label text-justify" for="leido">
                                                <span><b>HE LEÍDO </b> la cláusula de protección de datos y 
                                                    <b>DOY MI CONSENTIMIENTO</b> para el tratamiento de los mismos (*)</span>
                                            </label>
                                            </div>
                                        </div>  

                                        <div class="form-group">
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="solicito_inscripcion" name="solicito_inscripcion" required>
                                            <label class="form-check-label text-justify" for="solicito_inscripcion">
                                                <span><b>SOLICITO </b>expresamente mi inscripción en la actividad de ACOMPAÑAMIENTO DIGITAL Y CAPACITACIÓN 
                                                    PARA EL ACCESO A LA ADMINISTRACIÓN ELECTRÓNICA incluida 
                                                    en el proyecto <b>"Apoyo para el acceso a la administración electrónica y reducción de la brecha 
                                                        digital en la población más vulnerable de León".</b> (*)
                                                    </span>
                                            </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="solicito_contacto" name="solicito_contacto" required>
                                            <label class="form-check-label text-justify" for="solicito_contacto">
                                                <span><b>SOLICITO </b> que los técnicos del proyecto se pongan en conmigo para establecer 
                                                            el día y la hora para desarrollar la actividad de <b>ACOMPAÑAMIENTO DIGITAL Y CAPACITACIÓN 
                                                            PARA EL ACCESO A LA ADMINISTRACIÓN ELECTRÓNICA</b>. (*)
                                                    </span>
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                
                                <!-- Firma -->

                                <?php include_once("firma_pruebas.php"); ?>
                            </div>

                            <!-- Botón enviar -->

                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="text-center ">
                                
                                    <!-- Boton real SUBMIT-->                                        
                                    <button type="submit" id="pulsar_enviar_btn" class=" btn btn-block send-button btn-success btn-lg tx-tfm" ><i class="fas fa-send fa-2x"></i><p>Aceptar y enviar</p>    </button>

                                    </div>              
                                </div> 
                            </div>
                            <p class="small mt-3">Desarrollado en el marco del proyecto <a href="#" class="ps-hero__content__link">Puertas Digitales</a> del <a href="#">Excmo. Ayuntamiento de León</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div id="container_logos" class="row justify-content-center align-items-center">
            <div class="col-xs-auto logo_modal"><img src="./img/logo_FSE.svg" alt=""></div>
            <div class="col-xs-auto logo_modal"><img src="./img/logo_ayto_1 copy.svg" alt=""></div>
            <div class="col-xs-auto logo_modal"><img src="./img/logo_jcyl.svg" alt=""></div>
            <div class="col-xs-auto logo_modal"><img src="./img/logo_ecyl.svg" alt=""></div>
            <div class="col-xs-auto logo_modal"><img src="./img/logo_garantia.png" alt=""></div>
            <div class="col-xs-auto logo_modal"><img src="./img/logo_edis_1.svg" alt=""></div>
            <div class="col-xs-auto logo_modal"><img src="./img/logo_puertas_digitales.svg" alt=""></div>
          </div>
    </footer>
    <!-- Modales -->

    <?php include_once("modales.php"); ?>

    <!-- Scripts JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
    
    <script src="main.js"></script>
    <script src="./preloader/preloader.js"></script>
    

    <script>

        
        
        function resetea(){
            document.formulario.reset();
      
        }

        $( document ).ready(function() {

            var cont = setInterval(hasClase, 100);
            function hasClase (){
                
                if (document.getElementById("caja_loader").classList.contains( 'caja_loader_2')) {
                    
                        let apareceElements = document.getElementsByClassName("aparece")
                        for(let i = 0; i < apareceElements.length; i++) {
                            
                            const element = apareceElements[i];
                            setTimeout( ()=>{
                                /* element.classList.remove("oculto2"); */
                                $(element).fadeIn("slow");
                            },5000)
                        }
            
                    clearInterval(cont);
                }
            }
            
             /* Manejador del SUBMIT */

             $("#pulsar_enviar_btn").click(function(event) {
                
                console.log($("#aus-form").is(":valid"));
                
            
                if ($("#aus-form").is(":valid")) {
                    event.preventDefault();
                    pulsarSubmit();
                   
                }

            });

            /** Gestión de las labels y placeholders de los campos  */

            $(".section").on("focus", "input, select", (e) => {
                $(e).scrollTop();
                gestiona_labels(e);
            });


        }); /**--> END READY */

        /** PANEL DE FIRMA */

        function f() {
            var data = signaturePad.toDataURL('image/png');
            document.formulario.firma.value = data;
           
        }

        function mayus(e) {
            e.value = e.value.toUpperCase();
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

            
                

         
            });
        }


    </script>
</body>
</html>