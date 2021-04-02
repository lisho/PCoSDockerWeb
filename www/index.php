<?php
// iniciamos una sesion
session_start();
//verificamos si hay cambios de lenguaje mediante POST
if(isset($_POST["lang"])){
    $lang = $_POST["lang"];
    if(!empty($lang)){
      $_SESSION["lang"] = $lang;
    }
  }
  // verificamos la sesion creada
  if(isset($_SESSION['lang'])){
    // si es true, se crea el require y la variable lang
    $lang = $_SESSION["lang"];
    require "lang/".$lang.".php";
    // si no hay sesion por default se carga el lenguaje espanol
  }else{
    require "lang/ES.php";
  }
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $lang['titulo']; ?></title>
        <!-- Mapbox -->
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="imagenes/Favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />       
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo $lang['titulo']; ?></a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <?php echo $lang['Menu']; ?>
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#tramites"><?php echo $lang['Tramites']; ?></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#ubicacion"><?php echo $lang['Ubicacion']; ?></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contacto"><?php echo $lang['Contacto']; ?></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#equipo"><?php echo $lang['Equipo']; ?></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a href="#opciones" data-toggle="modal" class="nav-link py-3 px-0 px-lg-3 rounded" role="button">
                        
                        <?php echo $lang['Idioma']; ?>
                </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-center fondo" style="background: url(../imagenes/Portada_Bienvenidos3.jpg) center center no-repeat; background-position: fixed; background-size: cover; background-repeat: no-repeat; color:white">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0"><?php echo $lang['titulo']; ?></h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i role="presentation" class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0"><?php echo $lang['Dtitulo']; ?></p>
            </div>
        </header>

        <!-- Abrimos MAIN -->
        <main>

        <!-- Sección Trámites (Portfolios) -->
        <section class="page-section portfolio" id="tramites">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-secondary mb-0"><?php echo $lang['TRAMITES']; ?></h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i role="presentation" class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <!-- Barra de búsqueda -->
                              
            <!--     <div>
                <form id="submit-button" method="post">
                <input aria-label="palabra" name="palabra" placeholder="<?php echo $lang['Palabras Clave']; ?>">
                <input id="Randall" type="submit" name="buscador" value="<?php echo $lang['Buscar']; ?>">
                <input type="button" value="<?php echo $lang['Mostrar Resultados']; ?>" data-toggle='modal' data-target='#portfolioModalbus'>
                </form>
                </div>
                <br/> -->

                 <!-- Barra de búsqueda 2-->
                              
                <div>
                    <form id="submit-button" method="post">
                        <input id="palabra" aria-label="palabra" name="palabra" placeholder="<?php echo $lang['Palabras Clave']; ?>">
                        <input id="buscar" type="button" name="buscador" value="<?php echo $lang['Buscar']; ?>" data-toggle='modal' data-target='#portfolioModalbus'>
                        <!-- <input type="button" value="<?php echo $lang['Mostrar Resultados']; ?>" data-toggle='modal' data-target='#portfolioModalbus'> -->
                    </form>
                </div>
                <br/>

 <div class="portfolio-modal modal fade" id="portfolioModalbus" tabindex="-1" role="dialog" aria-labelledby="ModalBus" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalBus"><?php echo $lang['Busqueda']; ?></h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>

                                    <!-- Lista de trámites -->
                                    <div id="datosBusqueda" class="col-sm-12">

<!-- La idea es que la web SIEMPRE abra el modal de resultados de búsqueda, pero hacemos la condicion de que para que lo abra debe existir el $_POST['buscador] con un "isset" -->


									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal bus0.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $query = "SELECT * FROM $tabla WHERE Etiquetas LIKE '%$buscar%' ORDER BY ID";
                                            $resultset = mysqli_query($connect, $query) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesBus= array();
                                            while($Tablabus = mysqli_fetch_array($resultset))
                                            array_push($listaTramitesBus, $Tablabus);
											
											echo "<div class='row justify-content-center'>";
											for ($bus = 0; $bus < count($listaTramitesBus); $bus++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalBusA".$bus."' tabindex='-1' role='dialog' aria-labelledby='ModalBus".$bus."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalBus".$bus."'>".$listaTramitesBus[$bus][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesBus[$bus][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesBus[$bus][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesBus[$bus][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesBus[$bus][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>
                                                                <br/>
                                                                <div class='row justify-content-center'>
                                                                  <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>


                <!-- Portfolio Grid Items -->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1 -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <a href="#"><img class="img-fluid" src="imagenes/Tramites/Sacyl.png" alt="Trámites de SACYL" /></a>
                        </div>
                    </div>
                    <!-- Portfolio Item 2 -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <a href="#"><img class="img-fluid" src="imagenes/Tramites/Ecyl.png" alt="Trámites de ECYL" /></a>
                        </div>
                    </div>
                    <!-- Portfolio Item 3 -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <a href="#"><img class="img-fluid" src="imagenes/Tramites/DGT.png" alt="Trámites de DGT" /></a>
                        </div>
                    </div>
                    <!-- Portfolio Item 4 -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal4">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <a href="#"><img class="img-fluid" src="imagenes/Tramites/Policia.png" alt="Trámites de Policía y Extranjería" /></a>
                        </div>
                    </div>
                    <!-- Portfolio Item 5 -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal5">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <a href="#"><img class="img-fluid" src="imagenes/Tramites/Ayto.png" alt="Trámites de Ayuntamiento" /></a>
                        </div>
                    </div>
                    <!-- Portfolio Item 6 -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal6">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <a href="#"><img class="img-fluid" src="imagenes/Tramites/Inss.png" alt="Trámites de INSS" /></a>
                        </div>
                    </div>
                    <!-- Portfolio Item 7 -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal7">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <a href="#"><img class="img-fluid" src="imagenes/Tramites/AEAT.png" alt="Trámites de AEAT" /></a>
                        </div>
                    </div>
                    <!-- Portfolio Item 8 -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal8">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <a href="#"><img class="img-fluid" src="imagenes/Tramites/Sepe.png" alt="Trámites de SEPE" /></a>
                        </div>
                    </div>
                    <!-- Portfolio Item 9 -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal9">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <a href="#"><img class="img-fluid" src="imagenes/Tramites/Justicia.png" alt="Trámites de Justicia" /></a>
                        </div>
                    </div>
                    <!-- Portfolio Item 10 -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal10">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <a href="#"><img class="img-fluid" src="imagenes/Tramites/JuntaCyL.png" alt="Trámites de Junta de Castilla Y León" /></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>



        <!-- UBICACIÓN -->
        <section class="page-section bg-primary text-white mb-0" id="ubicacion">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white"><?php echo $lang['UBICACION']; ?></h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i role="presentation" class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h3 class="text-center"><?php echo $lang['UBICACION Y HORARIOS']; ?></h3><br/>
                        <div class="row justify-content-center align-items-center" aria-hidden="true" tabindex="-1">
                            <div id='map' style='width: 800px; height: 450px;'></div>
                        </div>
                        <br/>
                        <h4 class="text"><?php echo $lang['Ubicacion 1']; ?></h4>
                        <HR>
                        <ul>
                            <li><p><?php echo $lang['Horarios']; ?>: 9:00 a 14:00</p></li>
                            <li><p><?php echo $lang['Telefono']; ?>: 648650412</p></li>
                            <li><p><?php echo $lang['Direccion']; ?>: C/ Tambar&oacute;n s/n - 24008(Le&oacute;n)</p></li>
                        </ul>
                        <br/>
                        <h4 class="text"><?php echo $lang['Ubicacion 2']; ?></h4>
                        <HR>
                        <ul>
                            <li><p><?php echo $lang['Horarios']; ?>: 9:00 a 14:00</p></li>
                            <li><p><?php echo $lang['Telefono']; ?>: 648650412</p></li>
                            <li><p><?php echo $lang['Direccion']; ?>: Avda. de la Magdalena 1 - 24009(Le&oacute;n)</p></li>
                        </ul>
                        <br/>
                        <h4 class="text"><?php echo $lang['Ubicacion 3']; ?></h4>
                        <HR>
                        <ul>
                            <li><p><?php echo $lang['Horarios']; ?>: 9:00 a 14:00</p></li>
                            <li><p><?php echo $lang['Telefono']; ?>: 648650412</p></li>
                            <li><p><?php echo $lang['Direccion']; ?>: C/ Fraga Iribarne 3 - 24009(Armunia)</p></li>
                        </ul>
                        <br/>
                        <h4 class="text"><?php echo $lang['Ubicacion 4']; ?></h4>
                        <HR>
                        <ul>
                            <li><p><?php echo $lang['Horarios']; ?>: 9:00 a 14:00</p></li>
                            <li><p><?php echo $lang['Telefono']; ?>: 648650412</p></li>
                            <li><p><?php echo $lang['Direccion']; ?>: C/ La Serna 3 - 24007(Le&oacute;n)</p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>



        <!-- Contact Section-->
        <section class="page-section" id="contacto">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?php echo $lang['CONTACTO']; ?></h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i role="presentation" class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form id="contactForm" name="sentMessage" novalidate="novalidate">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label for="name"><?php echo $lang['Nombre']; ?></label>
                                    <input class="form-control" id="name" type="text" placeholder="<?php echo $lang['Nombre']; ?>" required="required" data-validation-required-message="Introduzca su nombre completo." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label for="email"><?php echo $lang['Correo Electronico']; ?></label>
                                    <input class="form-control" id="email" type="email" placeholder="<?php echo $lang['Correo Electronico']; ?>" required="required" data-validation-required-message="Introduzca su dirección de correo electrónico." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label for="phone"><?php echo $lang['Telefono']; ?></label>
                                    <input class="form-control" id="phone" type="tel" placeholder="<?php echo $lang['Telefono']; ?>" required="required" data-validation-required-message="Introduzca su número de teléfono." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label for="message"><?php echo $lang['Mensaje']; ?></label>
                                    <textarea class="form-control" id="message" rows="5" placeholder="<?php echo $lang['Mensaje']; ?>" required="required" data-validation-required-message="Introduzca el mensaje."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br/>
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit"><?php echo $lang['Enviar']; ?></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="equipo">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white"><?php echo $lang['EQUIPO DE PROYECTO']; ?></h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i role="presentation" class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row justify-content-center">
                    <p class="lead text-center"><?php echo $lang['Contenido equipo proyecto']; ?></p>
                </div>
                <div class="row justify-content-center">
                    <p class="lead text-center"><?php echo $lang['Contenido equipo proyecto2']; ?></p>
                </div>
                <!-- About Section Button
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
                        <i class="fas fa-download mr-2"></i>
                        Free Download!
                    </a>
                </div>
                -->
            </div>
        </section>

        <!-- Cerramos MAIN -->
        </main>

        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Datos -->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h3 class="text-uppercase mb-4"><?php echo $lang['Nuestros Datos']; ?></h3>
                        
                        <p class="lead mb-0">
                            Calle Falsa 123, 24008, León
                        </p>
                        <br/>
                        
                        <p class="lead mb-0">
                            <?php echo $lang['Telefono']; ?>: xxxxxxxxx
                            <br/>
                            <?php echo $lang['Correo Electronico']; ?>: nombre@servidor.com
                        </p>

                        <br/>
                        <!-- Footer Social Icons-->
                        <p class="lead mb-0">
                            <a class="btn btn-outline-light btn-social mx-1" aria-label="Ir a WhatsApp" href="#!"><i class="fab fa-fw fa-whatsapp"></i></a>
                            <a class="btn btn-outline-light btn-social mx-1" aria-label="Ir a Telegram" href="#!"><i class="fab fa-fw fa-telegram"></i></a>
                        </p>

                    </div>
                    <!-- Footer Guias -->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h3 class="text-uppercase mb-4">Enlaces de Interés</h3>
                            <h4 class="lead mb-0">
                                <a href="#guias" data-toggle="modal">Guías</a>
                            </h4>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h3 class="text-uppercase mb-4"><?php echo $lang['Organizaciones colaboradoras']; ?></h3>
                        <p class="lead mb-0">
                            <?php echo $lang['Ayuntamiento de Leon']; ?><br/>
                            Junta de Castilla y León<br/>
                            SACYL
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small><?php echo $lang['Copyright 2021 Ayuntamiento de Leon. Todos los derechos reservados.']; ?></small></div>
        </div>

        
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" aria-label="Volver a Inicio" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- MODALES DE LOS PORTFOLIOS -->

        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="ModalSACYL" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalSACYL">SACYL</h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>


                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_sacyl = "SELECT * FROM $tabla WHERE Institucion = 'SACYL' ORDER BY ID";
                                            $tramitesSACYL = mysqli_query($connect, $sql_query_sacyl) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesSACYL= array();
                                            while($sacyl = mysqli_fetch_array($tramitesSACYL))
                                            array_push($listaTramitesSACYL, $sacyl);
											
											echo "<div class='row justify-content-center'>";
											for ($a = 0; $a < count($listaTramitesSACYL); $a++)
											{
                                                echo "<div class='col-md-6 col-lg-4 mb-5 portfolio-item mx-auto'><button class='btn' style='background-color: #779ECB' data-toggle='modal' data-target='#ModalA".$a."'><img class='img-fluid' src='".$listaTramitesSACYL[$a][7]."' alt='Logo Trámite SACYL' />";
                                                echo $listaTramitesSACYL[$a][2]."
                                                </button>";
                                                echo "</div>";                                      
											}
											echo "</div>";
										?>
									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Modal 1.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_sacyl2 = "SELECT * FROM $tabla WHERE Institucion = 'SACYL' ORDER BY ID";
                                            $tramitesSACYL2 = mysqli_query($connect, $sql_query_sacyl2) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesSACYL2= array();
                                            while($sacyl2 = mysqli_fetch_array($tramitesSACYL2))
                                            array_push($listaTramitesSACYL2, $sacyl2);
											
											echo "<div class='row justify-content-center'>";
											for ($a = 0; $a < count($listaTramitesSACYL2); $a++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalA".$a."' tabindex='-1' role='dialog' aria-labelledby='ModalSACYL".$a."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalSACYL".$a."'>".$listaTramitesSACYL2[$a][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesSACYL2[$a][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesSACYL2[$a][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesSACYL2[$a][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesSACYL2[$a][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>
                                                                <br/>
                                                                <div class='row justify-content-center'>
                                                                  <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>





        <!-- Portfolio Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="ModalECYL" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalECYL">ECYL</h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_ecyl = "SELECT * FROM $tabla WHERE Institucion = 'ECYL' ORDER BY ID";
                                            $tramitesECYL = mysqli_query($connect, $sql_query_ecyl) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesECYL= array();
                                            while($ecyl = mysqli_fetch_array($tramitesECYL))
                                            array_push($listaTramitesECYL, $ecyl);
											
											echo "<div class='row justify-content-center'>";
											for ($b = 0; $b < count($listaTramitesECYL); $b++)
											{
                                                echo "<div class='col-md-6 col-lg-4 mb-5'><button class='btn' style='background-color: #FFA9A9' data-toggle='modal' data-target='#ModalB".$b."'><img class='img-fluid' src='".$listaTramitesECYL[$b][7]."' alt='Logo Trámite ECYL' />";
                                                echo $listaTramitesECYL[$b][2]."
                                                </button>";
                                                echo "</div>";                                      
											}
											echo "</div>";
										?>
									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Modal 2.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_ecyl2 = "SELECT * FROM $tabla WHERE Institucion = 'ECYL' ORDER BY ID";
                                            $tramitesECYL2 = mysqli_query($connect, $sql_query_ecyl2) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesECYL2= array();
                                            while($ecyl2 = mysqli_fetch_array($tramitesECYL2))
                                            array_push($listaTramitesECYL2, $ecyl2);
											
											echo "<div class='row justify-content-center'>";
											for ($b = 0; $b < count($listaTramitesECYL2); $b++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalB".$b."' tabindex='-1' role='dialog' aria-labelledby='ModalECYL".$b."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalECYL".$b."'>".$listaTramitesECYL2[$b][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesECYL2[$b][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesECYL2[$b][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesECYL2[$b][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesECYL2[$b][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>
                                                                <br/>
                                                                <div class='row justify-content-center'>
                                                                  <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>
                    











        <!-- Portfolio Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-labelledby="ModalDGT" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalDGT">DGT</h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_dgt = "SELECT * FROM $tabla WHERE Institucion = 'DGT' ORDER BY ID";
                                            $tramitesDGT = mysqli_query($connect, $sql_query_dgt) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesDGT= array();
                                            while($dgt = mysqli_fetch_array($tramitesDGT))
                                            array_push($listaTramitesDGT, $dgt);
											
											echo "<div class='row justify-content-center'>";
											for ($c = 0; $c < count($listaTramitesDGT); $c++)
											{
                                                echo "<div class='col-md-6 col-lg-4 mb-5'><button class='btn' style='background-color: #9C9C9C' data-toggle='modal' data-target='#ModalC".$c."'><img class='img-fluid' src='".$listaTramitesDGT[$c][7]."' alt='Logo Trámite DGT' />";
                                                echo $listaTramitesDGT[$c][2]."
                                                </button>";
                                                echo "</div>";                                      
											}
											echo "</div>";
										?>
									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Modal 3.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_dgt2 = "SELECT * FROM $tabla WHERE Institucion = 'DGT' ORDER BY ID";
                                            $tramitesDGT2 = mysqli_query($connect, $sql_query_dgt2) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesDGT2= array();
                                            while($dgt2 = mysqli_fetch_array($tramitesDGT2))
                                            array_push($listaTramitesDGT2, $dgt2);
											
											echo "<div class='row justify-content-center'>";
											for ($c = 0; $c < count($listaTramitesDGT2); $c++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalC".$c."' tabindex='-1' role='dialog' aria-labelledby='ModalDGT".$c."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalDGT".$c."'>".$listaTramitesDGT2[$c][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesDGT2[$c][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesDGT2[$c][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesDGT2[$c][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesDGT2[$c][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>                                                                
                                                                <br/>
                                                              <div class='row justify-content-center'>
                                                                <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                            </div>  
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>



        <!-- Portfolio Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-labelledby="ModalPolicia" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalPolicia">Policía y Extranjería</h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    
                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_policia = "SELECT * FROM $tabla WHERE Institucion = 'EXTRANJERIA Y POLICIA' ORDER BY ID";
                                            $tramitesPolicia = mysqli_query($connect, $sql_query_policia) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesPolicia= array();
                                            while($policia = mysqli_fetch_array($tramitesPolicia))
                                            array_push($listaTramitesPolicia, $policia);
											
											echo "<div class='row justify-content-center'>";
											for ($d = 0; $d < count($listaTramitesPolicia); $d++)
											{
                                                echo "<div class='col-md-6 col-lg-4 mb-5'><button class='btn' style='background-color: #1897C2' data-toggle='modal' data-target='#ModalD".$d."'><img class='img-fluid' src='".$listaTramitesPolicia[$d][7]."' alt='Logo Trámite Policia' />";
                                                echo $listaTramitesPolicia[$d][2]."
                                                </button>";
                                                echo "</div>";                                      
											}
											echo "</div>";
										?>
									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Modal 4.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_policia2 = "SELECT * FROM $tabla WHERE Institucion = 'EXTRANJERIA Y POLICIA' ORDER BY ID";
                                            $tramitesPolicia2 = mysqli_query($connect, $sql_query_policia2) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesPolicia2= array();
                                            while($policia2 = mysqli_fetch_array($tramitesPolicia2))
                                            array_push($listaTramitesPolicia2, $policia2);
											
											echo "<div class='row justify-content-center'>";
											for ($d = 0; $d < count($listaTramitesPolicia2); $d++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalD".$d."' tabindex='-1' role='dialog' aria-labelledby='ModalPolicia".$d."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalPolicia".$d."'>".$listaTramitesPolicia2[$d][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesPolicia2[$d][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesPolicia2[$d][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesPolicia2[$d][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesPolicia2[$d][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>
                                                                <br/>
                                                                <div class='row justify-content-center'>
                                                                  <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>



        <!-- Portfolio Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-labelledby="ModalAyto" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalAyto">Ayuntamiento</h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_ayto = "SELECT * FROM $tabla WHERE Institucion = 'AYTO-LEON' ORDER BY ID";
                                            $tramitesAyto = mysqli_query($connect, $sql_query_ayto) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesAyto= array();
                                            while($ayto = mysqli_fetch_array($tramitesAyto))
                                            array_push($listaTramitesAyto, $ayto);
											
											echo "<div class='row justify-content-center'>";
											for ($e = 0; $e < count($listaTramitesAyto); $e++)
											{
                                                echo "<div class='col-md-6 col-lg-4 mb-5'><button class='btn' style='background-color: #C89C7D' data-toggle='modal' data-target='#ModalE".$e."'><img class='img-fluid' src='".$listaTramitesAyto[$e][7]."' alt='Logo Trámite Ayuntamiento' />";
                                                echo $listaTramitesAyto[$e][2]."
                                                </button>";
                                                echo "</div>";                                      
											}
											echo "</div>";
										?>
									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Modal 5.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_ayto2 = "SELECT * FROM $tabla WHERE Institucion = 'AYTO-LEON' ORDER BY ID";
                                            $tramitesAyto2 = mysqli_query($connect, $sql_query_ayto2) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesAyto2= array();
                                            while($ayto2 = mysqli_fetch_array($tramitesAyto2))
                                            array_push($listaTramitesAyto2, $ayto2);
											
											echo "<div class='row justify-content-center'>";
											for ($e = 0; $e < count($listaTramitesAyto2); $e++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalE".$e."' tabindex='-1' role='dialog' aria-labelledby='ModalAyto".$e."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalAyto".$e."'>".$listaTramitesAyto2[$e][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesAyto2[$e][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesAyto2[$e][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesAyto2[$e][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesAyto2[$e][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>
                                                                <br/>
                                                                <div class='row justify-content-center'>
                                                                  <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>

        <!-- Portfolio Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-labelledby="ModalInss" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalInss">INSS</h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_Inss = "SELECT * FROM $tabla WHERE Institucion = 'INSS' ORDER BY ID";
                                            $tramitesInss = mysqli_query($connect, $sql_query_Inss) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesInss= array();
                                            while($Inss = mysqli_fetch_array($tramitesInss))
                                            array_push($listaTramitesInss, $Inss);
											
											echo "<div class='row justify-content-center'>";
											for ($f = 0; $f < count($listaTramitesInss); $f++)
											{
                                                echo "<div class='col-md-6 col-lg-4 mb-5'><button class='btn' style='background-color: #9FD5D1' data-toggle='modal' data-target='#ModalF".$f."'><img class='img-fluid' src='".$listaTramitesInss[$f][7]."' alt='Logo Trámite Inss' />";
                                                echo $listaTramitesInss[$f][2]."
                                                </button>";
                                                echo "</div>";                                      
											}
											echo "</div>";
										?>
									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Modal 6.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_Inss2 = "SELECT * FROM $tabla WHERE Institucion = 'INSS' ORDER BY ID";
                                            $tramitesInss2 = mysqli_query($connect, $sql_query_Inss2) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesInss2= array();
                                            while($Inss2 = mysqli_fetch_array($tramitesInss2))
                                            array_push($listaTramitesInss2, $Inss2);
											
											echo "<div class='row justify-content-center'>";
											for ($f = 0; $f < count($listaTramitesInss2); $f++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalF".$f."' tabindex='-1' role='dialog' aria-labelledby='ModalInss".$f."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalInss".$f."'>".$listaTramitesInss2[$f][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesInss2[$f][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesInss2[$f][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesInss2[$f][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesInss2[$f][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>
                                                                <br/>
                                                                <div class='row justify-content-center'>
                                                                  <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>


        <!-- Portfolio Modal 7-->
        <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-labelledby="ModalAEAT" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalAEAT">Agencia Tributaria</h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_aeat = "SELECT * FROM $tabla WHERE Institucion = 'AEAT' ORDER BY ID";
                                            $tramitesAEAT = mysqli_query($connect, $sql_query_aeat) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesAEAT= array();
                                            while($aeat = mysqli_fetch_array($tramitesAEAT))
                                            array_push($listaTramitesAEAT, $aeat);
											
											echo "<div class='row justify-content-center'>";
											for ($g = 0; $g < count($listaTramitesAEAT); $g++)
											{
                                                echo "<div class='col-md-6 col-lg-4 mb-5'><button class='btn' style='background-color: #FFE0B2' data-toggle='modal' data-target='#ModalG".$g."'><img class='img-fluid' src='".$listaTramitesAEAT[$g][7]."' alt='Logo Trámite AEAT' />";
                                                echo $listaTramitesAEAT[$g][2]."
                                                </button>";
                                                echo "</div>";                                      
											}
											echo "</div>";
										?>
									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Modal 7.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_aeat2 = "SELECT * FROM $tabla WHERE Institucion = 'AEAT' ORDER BY ID";
                                            $tramitesAEAT2 = mysqli_query($connect, $sql_query_aeat2) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesAEAT2= array();
                                            while($aeat2 = mysqli_fetch_array($tramitesAEAT2))
                                            array_push($listaTramitesAEAT2, $aeat2);
											
											echo "<div class='row justify-content-center'>";
											for ($g = 0; $g < count($listaTramitesAEAT2); $g++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalG".$g."' tabindex='-1' role='dialog' aria-labelledby='ModalAEAT".$g."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalAEAT".$g."'>".$listaTramitesAEAT2[$g][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesAEAT2[$g][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesAEAT2[$g][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesAEAT2[$g][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesAEAT2[$g][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>
                                                                <br/>
                                                                <div class='row justify-content-center'>
                                                                  <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>


        <!-- Portfolio Modal 8-->
        <div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" role="dialog" aria-labelledby="ModalSEPE" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalSEPE">SEPE</h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_sepe = "SELECT * FROM $tabla WHERE Institucion = 'SEPE' ORDER BY ID";
                                            $tramitesSEPE = mysqli_query($connect, $sql_query_sepe) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesSEPE= array();
                                            while($sepe = mysqli_fetch_array($tramitesSEPE))
                                            array_push($listaTramitesSEPE, $sepe);
											
											echo "<div class='row justify-content-center'>";
											for ($h = 0; $h < count($listaTramitesSEPE); $h++)
											{
                                                echo "<div class='col-md-6 col-lg-4 mb-5'><button class='btn' style='background-color: #FDFD96' data-toggle='modal' data-target='#ModalH".$h."'><img class='img-fluid' src='".$listaTramitesSEPE[$h][7]."' alt='Logo Trámite SEPE' />";
                                                echo $listaTramitesSEPE[$h][2]."
                                                </button>";
                                                echo "</div>";                                      
											}
											echo "</div>";
										?>
									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Modal 8.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_sepe2 = "SELECT * FROM $tabla WHERE Institucion = 'SEPE' ORDER BY ID";
                                            $tramitesSEPE2 = mysqli_query($connect, $sql_query_sepe2) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesSEPE2= array();
                                            while($sepe2 = mysqli_fetch_array($tramitesSEPE2))
                                            array_push($listaTramitesSEPE2, $sepe2);
											
											echo "<div class='row justify-content-center'>";
											for ($h = 0; $h < count($listaTramitesSEPE2); $h++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalH".$h."' tabindex='-1' role='dialog' aria-labelledby='ModalSEPE".$h."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalSEPE".$h."'>".$listaTramitesSEPE2[$h][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesSEPE2[$h][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesSEPE2[$h][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesSEPE2[$h][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesSEPE2[$h][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>
                                                                <br/>
                                                                <div class='row justify-content-center'>
                                                                  <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>


        <!-- Portfolio Modal 9 -->
        <div class="portfolio-modal modal fade" id="portfolioModal9" tabindex="-1" role="dialog" aria-labelledby="ModalJusticia" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalJusticia">Justicia</h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_justicia = "SELECT * FROM $tabla WHERE Institucion = 'JUSTICIA' ORDER BY ID";
                                            $tramitesJusticia = mysqli_query($connect, $sql_query_justicia) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesJusticia= array();
                                            while($justicia = mysqli_fetch_array($tramitesJusticia))
                                            array_push($listaTramitesJusticia, $justicia);
											
											echo "<div class='row justify-content-center'>";
											for ($i = 0; $i < count($listaTramitesJusticia); $i++)
											{
                                                echo "<div class='col-md-6 col-lg-4 mb-5'><button class='btn' style='background-color: #E0E0E0' data-toggle='modal' data-target='#ModalI".$i."'><img class='img-fluid' src='".$listaTramitesJusticia[$i][7]."' alt='Logo Trámite Justicia' />";
                                                echo $listaTramitesJusticia[$i][2]."
                                                </button>";
                                                echo "</div>";                                      
											}
											echo "</div>";
										?>
									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Modal 9.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_justicia2 = "SELECT * FROM $tabla WHERE Institucion = 'JUSTICIA' ORDER BY ID";
                                            $tramitesJusticia2 = mysqli_query($connect, $sql_query_justicia2) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesJusticia2= array();
                                            while($justicia2 = mysqli_fetch_array($tramitesJusticia2))
                                            array_push($listaTramitesJusticia2, $justicia2);
											
											echo "<div class='row justify-content-center'>";
											for ($i = 0; $i < count($listaTramitesJusticia2); $i++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalI".$i."' tabindex='-1' role='dialog' aria-labelledby='ModalJusticia".$i."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalJusticia".$i."'>".$listaTramitesJusticia2[$i][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesJusticia2[$i][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesJusticia2[$i][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesJusticia2[$i][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesJusticia2[$i][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>
                                                                <br/>
                                                                <div class='row justify-content-center'>
                                                                  <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>



        <!-- Portfolio Modal 10 -->
        <div class="portfolio-modal modal fade" id="portfolioModal10" tabindex="-1" role="dialog" aria-labelledby="ModalJCyL" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h3 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="ModalJCyL">Junta de Castilla y León</h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_jcyl = "SELECT * FROM $tabla WHERE Institucion = 'TCYL' ORDER BY ID";
                                            $tramitesJCyL = mysqli_query($connect, $sql_query_jcyl) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesJCyL= array();
                                            while($jcyl = mysqli_fetch_array($tramitesJCyL))
                                            array_push($listaTramitesJCyL, $jcyl);
											
											echo "<div class='row justify-content-center'>";
											for ($j = 0; $j < count($listaTramitesJCyL); $j++)
											{
                                                echo "<div class='col-md-6 col-lg-4 mb-5'><button class='btn' style='background-color: #E57373' data-toggle='modal' data-target='#ModalJ".$j."'><img class='img-fluid' src='".$listaTramitesJCyL[$j][7]."' alt='Logo Trámite Junta de Castilla y Leçon' />";
                                                echo $listaTramitesJCyL[$j][2]."
                                                </button>";
                                                echo "</div>";                                      
											}
											echo "</div>";
										?>
									</div>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <?php echo $lang['Cerrar']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Modal 10.5-->
                    
                        <div class="portfolio-modal">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

                                    <!-- Lista de trámites -->
                                    <div class="col-sm-12">
										<?php
                                            $sql_query_jcyl2 = "SELECT * FROM $tabla WHERE Institucion = 'TCYL' ORDER BY ID";
                                            $tramitesJCyL2 = mysqli_query($connect, $sql_query_jcyl2) or die("error base de datos:". mysqli_error($connect));
                                            $listaTramitesJCyL2= array();
                                            while($jcyl2 = mysqli_fetch_array($tramitesJCyL2))
                                            array_push($listaTramitesJCyL2, $jcyl2);
											
											echo "<div class='row justify-content-center'>";
											for ($j = 0; $j < count($listaTramitesJCyL2); $j++)
											{
                                                
                                                // MODAL DEL TRÁMITE

                                                echo "<div class='modal fade child-modal' id='ModalJ".$j."' tabindex='-1' role='dialog' aria-labelledby='ModalJCyL".$j."' aria-hidden='true'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                            
                                                            echo "
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>";
                                                                
                                                            echo "
                                                            <div class='modal-body text-left'>
                                                            <h4 class='modal-title text-center' id='ModalJCyL".$j."'>".$listaTramitesJCyL2[$j][2]."</h4>
                                                            <br/>
                                                                <h5>".$lang['Descripcion']."</h5>
                                                                <p>".$listaTramitesJCyL2[$j][4]."</p><br/>
                                                                <h5>".$lang['Detalles']."</h5>
                                                                <p>".$listaTramitesJCyL2[$j][6]."</p><br/>
                                                                <h5>".$lang['Telefono']."</h5>
                                                                <p>".$listaTramitesJCyL2[$j][5]."</p><br/>
                                                                <h5>URL:</h5>
                                                                <p><a href=".$listaTramitesJCyL2[$j][3]." target=_blank class='btn btn-secondary'>".$lang['Iniciar Tramite']."</a></p><br/>
                                                                <br/>
                                                                <div class='row justify-content-center'>
                                                                  <button type='button' class='btn btn-primary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  ";
											}
											echo "</div>";
										?>
									</div>
                                    
                                </div>
                            </div>
                         </div>
        

    <!-- script mapbox -->

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiaXNtYWVsam92ZWwiLCJhIjoiY2tqd3ZvdnVvMG1kazJvbDdwYzRjNWpiaCJ9.e8nXcPkSodCnm4fWhD1tPQ';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-5.571874, 42.598129],
            zoom: 12.5// starting zoom
        });
        map.addControl(new mapboxgl.NavigationControl());
        var markerubicacion = new mapboxgl.Marker()
            .setLngLat([-5.567608832750985, 42.61540992862709])
            .setPopup(new mapboxgl.Popup().setHTML("<h1><?php echo $lang['Ubicacion 1']; ?></h1>"))
            .addTo(map);
        var markerubicacion2 = new mapboxgl.Marker()
            .setLngLat([-5.586365046292281, 42.600354830329216])
            .setPopup(new mapboxgl.Popup().setHTML("<h1><?php echo $lang['Ubicacion 2']; ?></h1>"))
            .addTo(map);
        var markerubicacion3 = new mapboxgl.Marker()
            .setLngLat([-5.587073202113175, 42.586222265901974])
            .setPopup(new mapboxgl.Popup().setHTML("<h1><?php echo $lang['Ubicacion 3']; ?></h1>"))
            .addTo(map);
        var markerubicacion4 = new mapboxgl.Marker()
            .setLngLat([-5.562315244440855, 42.60113151251918])
            .setPopup(new mapboxgl.Popup().setHTML("<h1><?php echo $lang['Ubicacion 4']; ?></h1>"))
            .addTo(map);
    </script>





<!-- Modal Opciones -->
<section>
    <div id="opciones" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><?php echo $lang['Idioma']; ?></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <a class="navbar-brand"></a>
                        <form class="form-inline" method="POST">
                            <!--<label class="mr-sm-2" for="lang"><?php echo $lang['Idioma']; ?></label>-->
                            <select id="lang" class="custom-select mb-2 mr-sm-2 mb-sm-0" name="lang">
                                <option value="ES"><?php echo $lang['Espanol']; ?></option>
                                <option value="EN"><?php echo $lang['Ingles']; ?></option>
                                <option value="FR"><?php echo $lang['Frances']; ?></option>
                            </select>
                            <button type="submit" class="btn btn-primary"><?php echo $lang['Select']; ?></button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal Guias -->
<section>
    <div id="guias" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Guías</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li><h4><a href="descargas/GMAIL_PARA_MOVIL.pdf" download="GMAIL PARA MOVIL.pdf">Gmail para móvil en PDF</a></h4></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="js/childmodal.js"></script>
        <script src="js.js"></script>
        <!-- Widget UserWay-->
        <script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "kFD5yf3tfb");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script>
        <noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
        
        <script>var idioma = '<?php echo $_SESSION["lang"]; ?>'</script>
        
    </body>
</html>
