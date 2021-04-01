<!DOCTYPE html>
<html lang="es">
<?php $_POST = array(); ?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Autorizo el uso de datos</title>

<link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="fontawesome-free-5.13.0-web/css/fontawesome.min.css" rel="stylesheet">
<link href="fontawesome-free-5.13.0-web/css/brands.css" rel="stylesheet">
<link href="fontawesome-free-5.13.0-web/css/solid.css" rel="stylesheet">
<link href="fontawesome-free-5.13.0-web/css/regular.css" rel="stylesheet">
<!-- DatePicker -->
<!-- <link rel="stylesheet" type="text/css" href="datepicker/mobiscroll.css"> -->
<!-- Animaciones css -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> -->
<link href="form.css" rel="stylesheet">
<link rel="stylesheet" href="footer.css" />
<script src="jquery-3.5.0.min.js"></script>
<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
<!-- <script src="familiares.js"></script> -->
</head>
<body onload="resetea()">
   <div class="container">
        <div class="col-md-8 mx-auto text-center">
            <div class="header-title">
                <div id="tit1" style = "display:none">
                    <h1 class="text-center" style="font-size: 4rem"><i class="fas fa-viruses"></i></h1>
                </div>
                
                <h1 class="wv-heading--title text-center " id="titulo_inicial">
                    
                    <div class=" text-xl">
                        
                    </div>
                    <div id="tit2" style = "display:none">
                         <p class=""><small>HERRAMIENTA DE APOYO PARA LA SOLICITUD DE</small></p>
                    </div>
                   
                    <div id="tit3" style = "display:none">
                        <p class=""><b class="primary "> AYUDAS DE URGENCIA SOCIAL </b></p>
                    </div>

                    <div id="tit4" style = "display:none">
                         <p ><small>POR PROCEDIMIENTO EXCEPCIONAL DURANTE EL ESTADO DE 
                    ALARMA SANITARIA POR COVID-19</small></p>
                    </div>
                    

                </h1>
            </div>
        </div>
        <div class="row">      
            <div class="col-md-8 mx-auto">
                <!-- Botonera inicial -->
                <div class="form-group  text-center">
                    <div type="button" class="btn btn-warning" id="lee_instrucciones" data-toggle="modal" data-target="#instrucciones" style = "display:none"><i class="fas fa-question-circle">   Lee las instrucciones antes de comenzar</i></div>
                </div>  
                <div class="form-group  text-center">    
                    <div class="btn btn-success btn-lg" id="comenzar" style = "display:none">Iniciar solicitud</div>
                </div>

                <div class="myform form oculto" id="inicio_myform">
                    <h2 class="wv-heading--subtitle text-center">
                        Indica tus datos en el siguiente formulario y pulsa el botón "enviar"
                    </h2>

                    <form action="pdf.php" method="post" name="formulario" autocomplete="nope" id="aus-form" enctype="multipart/form-data" >
                    

                        <!-- Datos del solicitante -->

                        <div class="card border-secondary section">
                            <div class="card-header">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-10 "><h5><i class="fas fa-address-card"></i>   ¿Quién solicita la ayuda?<!-- Datos de la persona que solicita --></h5></div>
                                                <div data-toggle="modal" data-target="#info_solicitante" class="col-2 text-right"><i type="button" id="info_solicitante_btn" class="fas fa-question-circle btn btn-info boton_help "></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="card-body text-secondary">
                                
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pasaporte" value="pasaporte" name="pasaporte" >
                                        <label class="text-justify" for="pasaporte">Marcar si sólo dispones de pasaporte </label>
                                    </div>

                                    <label for="dni" class="oculto">Documento de identidad (DNI/NIE)</label>
                                    <input type="text" name="dni"  class="form-control my-input dni_input" id="dni" placeholder="DNI/NIE" required onkeyup="ponerEnMayusculas(this);">
                                    <div class="invalid_alert"></div>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="estado" class="oculto">Estado Civil</label>
                                  
                                    <select id="estado" class="form-control my-input select_input" name="estado" placeholder="Estado Civil" required>
                                        <option value="" selected >Estado Civil...</option>
                                        <option>Casado/a o similar</option>
                                        <option>Soltero/a</option>
                                        <option>Separado/a judicialmente</option>
                                        <option>Divorciado/a</option>
                                        <option>Viudo/a</option>
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="direccion" class="oculto">Dirección</label>
                                    <div class="input-group">   
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="direccion_sign"><i class="fas fa-home"></i></div>
                                        </div>
                                        <input type="text" name="direccion"  class="form-control my-input direccion_input" id="direccion" placeholder="Direccion" required onkeyup="ponerEnMayusculas(this);">
                                    </div>
                                    
                                </div>

                                <div class="row form-group">
                                    <div class="col">
                                        <label for="cp" class="oculto">Código Postal</label>
                                        <select id="cp" class="form-control my-input select_input" name="cp" placeholder="Código Postal" required>
                                            <option value="" selected >Código Postal...</option>
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

                                    <div class="col">
                                        <label for="cp" class="oculto">Ciudad</label>
                                        <input type="text" name="ciudad" class="form-control my-input" id="ciudad" value="León" disabled>
                                    </div>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="email"  class="oculto">Correo electrónico</label>
                                    <div class="input-group">   
                                        <div class="input-group-prepend">
                                            <div class="input-group-text email_input" id="mail_sign">@</div>
                                        </div>
                                            <input type="email" name="email"  class="form-control my-input email_input" id="email" placeholder="Correo electrónico" aria-describedby="btnGroupAddon2">
                                             <div class="warning_alert"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone"  class="oculto">Número de teléfono</label>
                                    <div class="input-group">   
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="btphone_sign"><i class="fas fa-phone"></i></div>
                                        </div>
                                        <input type="number" min="0" name="phone" id="phone"  class="form-control my-input telefono_input" placeholder="Teléfono" required>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                        <br>
                    
                        <!-- Datos de la unidad familiar -->

                        <div class="card border-secondary section" id="card_familia">

                            <div class="card-header">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-10 "><h5><i class="fas fa-house-user"></i>    ¿Quién vive con la persona que solicita? <!-- Datos de la unidad familiar --></h5></div>
                                                <div data-toggle="modal" data-target="#info_familliares" class="col-2 text-right"><i type="button" id="info_familiares_btn" class="fas fa-question-circle btn btn-info boton_help animated flash"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body text-secondary" id="familiares">
                                <div id="no_convivo">
                                    <h4 class="text-center"> Vivo sólo/a.<!-- No convivo con ninguna otra persona --></h4>
                                    <div id="mano_efecto">
                                         <p class="text-center"> Si convives con más personas, por favor añádelos desde el botón </p>
                                        <p class="text-center"><i class="fas fa-hand-point-down fa-2x"></i></p>
                                    </div>
                                   
                                    
                                </div>
                               
                                <div class="card text-white bg-secondary miembro_familia oculto" id="card_miembro_0" style="margin-bottom:10px">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-user"></i>  <span>1ª</span> Persona que convive</h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><br></h6>
                                        <div class="form-group">
                                            <label for="dni0" class="oculto">DNI/NIE</label>
                                            <input type="text" name="dni0"  class="form-control my-input dni_input" id="dni0" placeholder="DNI/NIE" onkeyup="ponerEnMayusculas(this);">
                                             <div class="invalid_alert"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nombre0" class="oculto">Nombre  y Apellidos</label>
                                            <input type="text" name="nombre0"  class="form-control my-input text_input" id="nombre0" placeholder="Nombre  y Apellidos" onkeyup="ponerEnMayusculas(this);">
                                        </div>

                                        <div class="form-group">
                                            <label for="nacimiento0" class="oculto">Fecha de nacimiento</label>
                                            <input type="text" name="nacimiento0"  class="form-control my-input datepicker fecha_input" id="nacimiento0" placeholder="Fecha de nacimiento">
                                        </div>

                                        <div class="form-group">
                                            <label for="relacion0" class="oculto">Relación con el solicitante</label>
                                            <select id="relacion0" class="form-control my-input select_input" name="relacion0" >
                                                <option value="" selected>Relación con el solicitante...</option>
                                                <option>Cónyuge/Pareja sentimental</option>
                                                <option>Hijo/a</option>
                                                <option>Padre/Madre</option>
                                                <option>Otro parentesco</option>
                                                <option>Compañero/a de piso</option>
                                            <option>Otros</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="laboral0" class="oculto">Situación laboral</label>
                                            <select id="laboral0" class="form-control my-input select_input" name="laboral0">
                                                <option value="" selected >Situación laboral actual...</option>
                                                <option>Trabajador por cuenta ajena</option>
                                                <option>Autónomo</option>
                                                <option>Desempleado</option>
                                                <option>Otros</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check oculto">
                                                <input class="form-check-input" type="checkbox" id="autorizo_laboral0" value="autorizo_laboral0" name="autorizo_laboral0">
                                                <label class="text-justify" for="autorizo_laboral0">
                                                    AUTORIZO a recabar los datos referentes a mi capacidad económica (sólo mayores de 18 años)
                                                </label>
                                            </div>
                                        </div>   

                                      <!--  <div class ="float-right caja_borrar">
                                            <button type="button" id="eliminar0" class="btn btn-danger btn-sm mr-3 elimina_familiar"><i class="fas fa-trash-alt"></i>  Elimina esta persona</button>
                                        </div>  -->

                                        <div class ="float-right caja_borrar">
                                            <div class="elimina_familiar">
                                                ¿Quieres eliminar a esta persona? &nbsp
                                                <button type="button" id="eliminar0" class="btn btn-danger btn-sm mr-3 elimina_familiar"><i class="fas fa-trash-alt"></i>  </button>
                                                
                                            </div>
                                            
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                
                                
                                <div class="float-right">
                                    <button type="button" id="nuevo_familiar" class="btn btn-outline-dark align-self-center mr-3"> <i class="fas fa-plus"></i> Añade una nueva persona a la unidad familiar</button>
                                </div>
                            </div> 
                        </div>
                        <br>

                        <!-- Datos económicos -->

                        <div class="card border-secondary section">
                         
                            <div class="card-header">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-10 "><h5><i class="fas fa-money-bill-wave"></i>    Datos financieros</h5></div>
                                                <div data-toggle="modal" data-target="#info_economicos" class="col-2 text-right"><i type="button" id="info_economicos_btn" class="fas fa-question-circle btn btn-info boton_help animated flash"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body text-secondary" >
                                <div class="text-left">
                                    <div class="row">
                                        <div class="col-sm-9 label_ingresos"><label for="ingresos" class="oculto">Ingresos de la familia</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group container-fluid"> 
                                        
                                                <div class="input-group">

                                                    <div class="input-group-prepend ">
                                                        <div class="input-group-text" id="euro_sign"><i class="fas fa-euro-sign"></i></div>
                                                    </div>
                                                    
                                                    <input type="number" min="0" name="ingresos"  class="form-control my-input ingresos_input" id="ingresos" placeholder="Ingresos actuales" required>
                                                        
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-form-label text-center" ><h5>€/mes</h5></div>
                                        
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    
                                    <!-- <label for="cuenta_banco" class="oculto">Número de cuenta bancaria</label>
                                    <input type="text" name="cuenta_banco" class="form-control my-input cuenta_input" id="cuenta_banco" placeholder="Número de cuenta bancaria">
                                     <div class="invalid_alert"></div> -->

                                     <label for="cuenta_banco" class="oculto">Número de cuenta bancaria</label>
                                    <input type="text" name="cuenta_banco" class="form-control my-input cuenta_input" id="cuenta_banco" placeholder="Número de cuenta bancaria" onkeyup="ponerEnMayusculas(this);" required>
                                     <div class="invalid_alert"></div>

                                    <span class="small"> IBAN de la cuenta de la que <b>el solicitante declara ser titular </b>
                                    para recibir el importe que, en su caso, pudiera corresponderle como ayuda </span>    
                                </div>  
                            </div>
                        </div>
                        </br>

                        <!-- Concepto para el que se solicita la ayuda -->

                        <div class="card border-secondary section">

                            <div class="card-header">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-10"><h5><i class="fas fa-question"></i>    Concepto para el que se solicita la ayuda</h5></div>
                                                <div data-toggle="modal" data-target="#info_solicita" class="col-2 text-right"><i type="button" id="info_solicita_btn" class="fas fa-question-circle btn btn-info boton_help animated flash"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body text-secondary" >
                                <div class="jumbotron jumbotron-fluid">
                                    <div class="container">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input oculto" checked type="checkbox" id="concepto" required>
                                                <label class="form-check-label" for="concepto">
                                                    <h5><i class="fas fa-check-square"></i> Necesidades básicas de subsistencia</h5>
                                                </label>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <!-- Notificaciones -->

                        <div class="card border-secondary section">

                            <div class="card-header">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-10"><h5><i class="fas fa-mail-bulk"></i>    Notificaciones</h5></div>
                                                <div data-toggle="modal" data-target="#info_notificacion" class="col-2 text-right"><i id="info_notificacion_btn" type="button" class="fas fa-question-circle btn btn-info boton_help animated flash"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body text-secondary" id="opciones_notificacion">
                                <p> ¿Cómo deseas recibir las notificaciones relacionadas con esta solicitud? </p> 
                                <div class="form-group">
                                    <label class="form-check-label btn btn-outline-secondary btn-block notificaciones disabled" for="notifica_mail">
                                        <input type="radio" class="form-check-input oculto" name="notificaciones" id="notifica_mail" value="Electrónicamente, al e-mail indicado anteriormente." disabled >
                                            &nbsp Electrónicamente, al e-mail indicado anteriormente.
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label btn btn-outline-secondary btn-block notificaciones" for="notifica_correo">
                                        <input type="radio" class="form-check-input oculto" name="notificaciones" id="notifica_correo" value="En papel, a la dirección indicada anteriormente."  >
                                            &nbsp En papel, a la dirección indicada anteriormente.
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label btn btn-outline-secondary btn-block notificaciones" for="notifica_otro_correo">
                                        <input type="radio" class="form-check-input oculto" name="notificaciones" id="notifica_otro_correo" value="En papel, a otra dirección postal.">
                                            &nbsp En papel, a otra dirección postal.
                                    </label>
                                </div>
                                <div class="form-group container-fluid oculto" id="campo_direccion_notificaciones">
                                    <label for="nueva_direccion" class="oculto">Dirección a efectos de notificaciones</label>
                                    <div class="input-group">   
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="direccion_sign"><i class="fas fa-envelope-open-text"></i></div>
                                        </div>
                                        <input type="text" name="nueva_direccion"  class="form-control my-input" id="nueva_direccion" placeholder="Direccion para notificaciones">
                                    </div>        
                                </div>
                                <h5 class="text-center invalid_alert oculto">Debes elegir una de las opciones de notificación</h5>
                            </div>
                        </div>
                        <br>

                        <!-- Adjuntar documentos -->

                        <div class="card border-secondary section">
                    
                            <div class="card-header">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-10"><h5><i class="fas fa-paperclip"></i>    Adjuntar documentos</h5></div>
                                                <div data-toggle="modal" data-target="#info_archivos" class="col-2 text-right"><i id="info_archivos_btn" type="button" class="fas fa-question-circle btn btn-info boton_help animated flash"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body text-secondary" >
                                <h5> Adjunta, al menos </h5>
                                <ul class="small">
                                    <li><b>COPIA/FOTOGRAFÍA DE <span id="resalta_dni"><u>DNI/NIE POR LAS DOS CARAS</u></span></b> (u otro documento que acredite identidad)</li>
                                    <li><b>COPIA/FOTOGRAFÍA  DEL <span id="resalta_bancario">DOCUMENTO BANCARIO</span></b> (Debe figurar la persona solicitante como titular de la cuenta y deber ser 
                                    visible el número completo de la cuenta bancaria / IBAN)</li>    
                                </ul>
                                
                                <div class="controls file_upload_container">
           
                                    <div class="entry form-group col-xs-3">

                                        <div class="input-group">
                                            <label for="archivo0" class="subir btn btn-secondary btn-block form-control">
                                                <big><i class="fas fa-cloud-upload-alt"></i> Cargar archivo</big>
                                            </label>
                                            <input class="btn btn-outline-primary btn-block form-control" type="file" style='display: none;' id="archivo0" name="archivo0" >
                                            <div class="input-group-prepend">
                                                <div class="btn btn-outline-secondary delete_file" id=""><i class="fas fa-minus-circle"></i></div>
                                            </div>
                                            <div id="info"></div>                                           
                                        </div> 
                                    </div>

                                </div>  
                              
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary  btn-add mx-auto" type="button">
                                        <i class="fas fa-plus">   </i> <br>Añadir más archivos
                                    </button>
                                </div>  

                            </div>
                        </div>
                        <br>

                         <!-- Autorizaciones y declaraciones -->

                        <div class="card border-secondary section">
                           
                            
                            <div class="card-body text-white bg-secondary" id="check_declaraciones">
                                    
                                <div class="form-group">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="declaro_cierto" name="declaro_cierto" required>
                                    <label class="form-check-label text-justify" for="declaro_cierto"><span class="">
                                            <b>DECLARO BAJO MI RESPONSABILIDAD que son ciertos los datos</b> consignados
                                                en la presente solicitud y en los documentos que
                                                aporto y que conozco mi obligación de comunicar al Ayuntamiento 
                                                de León, cualquier variación que pudiera producirse en mis 
                                                circunstancias personales: domicilio, no miembros unidad familiar, etc.
                                                </span></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="comprometo" name="comprometo" required>
                                    <label class="form-check-label text-justify" for="comprometo">
                                        <span><b>ME COMPROMETO a justificar la Ayuda de Urgencia Social</b>, 
                                                en el caso de que me sea concedida, en el plazo máximo de 
                                                tres meses a contar desde la finalización del actual Estado de
                                                Alarma decretado por el COVID-19.
                                        </span>
                                    </label>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="leido" name="leido" required>
                                    <label class="form-check-label text-justify" for="leido">
                                        <span><b>HE LEÍDO</b> la cláusula de protección de datos 
                                            <span data-toggle="modal" data-target="#info_autorizo" class=""><i id="info_autorizo_btn" type="button" class="fas fa-question-circle btn btn-info boton_help animated flash"></i></span>
                                            y <b>AUTORIZO </b>a consultar mis datos.</span>
                                    </label>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="declaro_informado" name="declaro_informado" required>
                                    <label class="form-check-label text-justify" for="declaro_informado">
                                        <span><b>DECLARO </b>que he sido informado suficientemente sobre el 
                                            tratamiento de los datos personales que resulten necesarios a 
                                            tal fin, aportados en el presente formulario y, en su caso, en mi 
                                            historia social para tramitar la presente solicitud. 
                                            </span>
                                    </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="declaro_subvenciones" name="declaro_subvenciones" required>
                                    <label class="form-check-label text-justify" for="declaro_subvenciones">
                                        <span><b>DECLARO </b>que no me encuentro incurso en ninguno de los supuestos de incapacidad, incompatibilidad o prohibición para la percepción de ayudas o subvenciones públicas reguladas en la Ley 38/2003, de 17 de noviembre, General de Subvenciones.</span>
                                    </label>
                                    </div>
                                </div>    

                            </div>
                        </div>
                        <br>

                        <?php include_once("firma_pruebas.php"); ?>

                        
                          
                            <div class="row">
                                <div class="col-sm-12">
                                     <div class="form-group">
                                        <div class="btn btn-block btn-lg btn-info" id="btn_vista_previa" data-toggle="modal" data-target="#vista_previa" >
                                        <i class="fas fa-eye fa-2x"></i><p>Vista previa</p><small>Revisa atentamente los datos antes de enviarlos</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="text-center ">
                                    <!-- Boton SUBMIT de mentirijillas -->
                                        <button type="" id="pulsar_enviar_btn" class=" btn btn-block send-button btn-success btn-lg tx-tfm" ><i class="fas fa-space-shuttle fa-2x"></i><p>Enviar</p>    </button> 
                                    <!-- Boton real SUBMIT-->                                        
                                    <button type="submit" id="enviar_btn" class=" btn btn-block send-button btn-success btn-lg tx-tfm  oculto" ><i class="fas fa-space-shuttle fa-2x" ></i><p>Enviar</p>    </button>
 
                                    </div>              
                                </div> 
                            </div>

                        <p class="small mt-3">Desarrollado en el marco del proyecto <a href="#" class="ps-hero__content__link">Puertas Digitales</a> del <a href="#">Excmo. Ayuntamiento de León</a>.
                        </p>
                    </form>


                    <!-- ENVIANDO ...-->

                    <div class="loading no-show">
                        <div class="spin"></div>
                        <div class="enviando_text"><h3 >Enviando ...</h3></div>
                        
                    </div>
                             
                </div>
            </div>
        </div>
    </div>

    
    <?php include_once("modales.php"); ?>

    <?php include_once("footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script> -->
    <script src="datepicker/mobiscroll.js"></script>
    <script src="validar_formulario.js"></script>
    <script src="moment-with-locales.min.js"></script>
    <script src="mis_animaciones.js"></script>


    <script>
    
        function resetea(){
            document.formulario.reset();
        }
    
        $( document ).ready(function() {

            /* Manejador del SUBMIT */

            $("#pulsar_enviar_btn").click(function(event) {
                
                console.log($("#aus-form").is(":valid"));
                
            
                if ($("#aus-form").is(":valid")) {
                    event.preventDefault();
                    pulsarSubmit();
                   
                }

            });

            /** Listener Boton comenzar */

            $("#comenzar").click((e)=>{
                $("#inicio_myform").removeClass("oculto");
                goToId("lee_instrucciones");
                $(e.target).hide();
                $("#nombre").focus();
            });
           

                    
            /** Gestión de las labels y placeholders de los campos  */

            $(".section").on("focus", "input, select", (e) => {

                if ($.inArray("datepicker", e.target.classList)) {
                         
                    lanza_datepicker(e);
                    $(e.target).change(function(event) {
                        
                        $("label[for='" + e.target.name + "']")
                        .fadeIn("10000")
                        .addClass("visto")
                        
                    });

                } else {  
                   gestiona_labels(e);
                }
            });

            /** Scripts para manejar miembros de la unidad familiar */

            var n = 0; //Contador de personas que conviven con el solicitante

            /** Listener para añadir un familiar */
            $("#nuevo_familiar").click(function () { 
                $("#no_convivo").hide();
                add_familiar(n);
                n++;
            });
            
            /** Listener para eliminar un familiar */
            $("#card_familia").on("click", "button[type=button].elimina_familiar", (e) => { remove_familiar(e, n);  n--;})
            
            /** Listener para manejar los radios de formas de notificar y 
             * para activar el campo de dirección a efectos de notificaciones */

            $("input[name=notificaciones]").click(function(e) {

                var id = e.target.id;
                var etiqueta = $("#"+id).parent();
                
                $.when(
                    $(".notificaciones").removeClass("btn-success btn-lg").addClass("btn-outline-secondary"),
                  

                ). then(()=> {

                    $(".notificaciones i:first-child").remove() 
                    etiqueta.addClass("btn-success btn-lg").removeClass("btn-outline-secondary").prepend("<i class='fas fa-check'></i>");
           
                    if(id == "notifica_otro_correo") {

                        $("#campo_direccion_notificaciones").slideDown();
                        $("#nueva_direccion").focus().prop('required', true);

                    } else {
                        $("#campo_direccion_notificaciones").fadeOut();
                        $("#nueva_direccion").removeAttr('required');
                        //$("#archivo0").focus();
                    }
                })

            });


            /** Llamada a la funcion que maneja la carga de los archivos */
            
            /** contador de archivos */
            var cuenta_archivos = 0;

            /** Creación del nuevo boton de carga */

            $(document).on('click', '.btn-add', function(e)
            {
                e.preventDefault();

                var controlForm = $('.controls');
                var currentEntry = $('.entry:last');
                var newEntry = $(currentEntry.clone()).appendTo(controlForm);
                        
                cuenta_archivos++;
                var nuevo_identificador = "archivo"+cuenta_archivos;
        
                $.when(

                    newEntry.find('input[type=file]').attr("id", nuevo_identificador),
                    newEntry.find('input[type=file]').attr("name", nuevo_identificador),
                    newEntry.find('label').attr("for", nuevo_identificador)
                        .removeClass('btn-success').addClass('btn-secondary small')
                        .html('<big><i class="fas fa-cloud-upload-alt"></i> Añadir archivo</big>'),

                ).then (()=>{

                    $('input[id='+nuevo_identificador+']').val('');
                    newEntry.find('.delete_file')
                        .addClass('btn-remove')
                        .removeClass('btn-outline-secondary').addClass('btn-danger');

                })
 
            }).on('click', '.btn-remove', function(e)
            {
                /** funcionalidad del boton de borrado de campo file */
                $(this).parents('.entry:first').remove();

                    e.preventDefault();
                    return false;
            });

            /** listener que detecta la carga de un archivo y cambia el aspecto del boton */

            $(".file_upload_container").on("change", "input[type=file]", function (e) {
                
                //console.log(e.target);

                let label;
                label = $("label[for='" + e.target.id + "']");

                var pdrs = "<i class='fas fa-cloud-upload-alt'>   -</i>       "+e.target.files[0].name;
                
                $(label).html(pdrs).removeClass("btn-secondary").addClass("btn-success");

            });
            

            /* Añadimos la fecha de hoy a la vista previa */
            moment.locale("es")
            var fecha_hoy = moment().format('LL');
            $("#fecha_hoy").html(fecha_hoy);

        }); /**--> END READY */


        /** PANEL DE FIRMA */

        function f() {
            var data = signaturePad.toDataURL('image/png');
            document.formulario.firma.value = data;
           
        }

        /** DATEPICKER */

        function lanza_datepicker(e) {
            
                $(".datepicker").scroller({
                  theme: 'android-ics light',  // options: ios / ios-classic / android-ics / android-ics light / android / sense-ui
                  lang: 'es_ES', // options: zh_CN (default: Englishhhh)
                  preset: 'date', // options  date / time / datetime
                  //onClose: gestiona_labels(e),
                  //onSelect: gestiona_labels(e),
                  //onCancel: function()
                })                

        }


        /** WAY POINTS */

        /* Funcion para determinar si un elemento está en pantalla */
        function inView(element, fullHeightInView) {

            var $element = $(element);
            var $window = $(window);
            var docViewTop = $window.scrollTop();
            var docViewBottom = docViewTop + $window.height();
            var elemTop = $element.offset().top;
            var elemBottom;

            if (fullHeightInView) {
                elemBottom = elemTop + $element.height();
            } else {
                elemBottom = elemTop;
            }
            
            return ((elemBottom >= docViewTop) &&
                (elemTop <= docViewBottom) &&
                (elemBottom <= docViewBottom) &&
                (elemTop >= docViewTop));
        }

        /* Función que crea un waypoint */
        function crea_waypoint(target, efecto_si, efecto_no) {
           
            $(window).scroll(function () {
               
                if (inView(target)) {  

                    target.addClass(efecto_si);
                }else {
                    target.removeClass(efecto_no);
                }
            });    
        }

        /* Nos manda a un lugar de la pagina por su id*/

        function goToId(idName){
            if($("#"+idName).length)
            {
                var target_offset = $("#"+idName).offset();
                var target_top = target_offset.top;
                $('html,body').animate({scrollTop:target_top},{duration:"slow"});
            }
        }

       
        jQuery.fn.reverse = [].reverse;
             
    </script>
</body>

</html>

