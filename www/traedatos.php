<?php
include('lang/'.$_POST['lang'].'.php');

//Conectamos con la base de datos en la que vamos a buscar
   $connect = mysqli_connect("db", "jovel", "N89--pRwxxx","jovel"); // servidor, user, pass, base
   mysqli_set_charset($connect, "utf8");

   $tabla="Pagina_ES"; 

   $buscar = $_POST['palabra'];

   // Si está vacío, lo informamos, sino realizamos la búsqueda
   if (empty($buscar)){
       echo "No se ha ingresado una cadena a buscar";
   }else{
        $query = "SELECT * FROM $tabla WHERE Etiquetas LIKE '%$buscar%' ORDER BY ID";
        $resultset = mysqli_query($connect, $query) or die("error base de datos:". mysqli_error($connect));
        $listaTramitesBus= array();
            while($Tablabus = mysqli_fetch_array($resultset))
            array_push($listaTramitesBus, $Tablabus);
           /*  echo "CUENTA; ".print_r(count($listaTramitesBus[0])); */
         /* echo print_r(count($Tablabus));  */
          
                //Si ha resultados
        if (count($listaTramitesBus)) {
                            echo "<div class='row justify-content-center'>";
                            for ($bus = 0; $bus < count($listaTramitesBus); $bus++)
                            {
                                echo "<div class='col-md-6 col-lg-4 mb-5'><button class='btn' style='background-color: #FFA9A9' data-toggle='modal' data-target='#ModalBus".$bus."'><img class='img-fluid' src='".$listaTramitesBus[$bus][7]."' alt='Logo Tr�mite ECYL' />";
                                echo "<div class='portfolio-item mx-auto' >
                                    ".$listaTramitesBus[$bus][2]."
                                    </div>
                                </button>";
                                echo "</div>";                                      
                            }
                            echo "</div>";
        }else{
           // En caso de no encontrar resultados
           echo "No se encontraron resultados para: $buscar";
        }
   }

?>



<?php

    $query = "SELECT * FROM $tabla WHERE Etiquetas LIKE '%$buscar%' ORDER BY ID";
    $resultset = mysqli_query($connect, $query) or die("error base de datos:". mysqli_error($connect));
    $listaTramitesBus= array();
        while($Tablabus = mysqli_fetch_array($resultset))
        array_push($listaTramitesBus, $Tablabus);
        echo "<div class='row justify-content-center'>";
        for ($bus = 0; $bus < count($listaTramitesBus); $bus++)
        {
            
            // MODAL DEL TRAMITE

            echo "<div class='modal fade child-modal' id='ModalBus".$bus."' tabindex='-1' role='dialog' aria-labelledby='ModalBus".$bus."' aria-hidden='true'>";
                echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                    echo "<div class='modal-content'>";
                        
                        echo "
                        <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>
                            <span aria-hidden='true'>&times;</span>
                        </button>";
                            
                        echo "
                        <div class='modal-body text-left'>
                        <h4 class='modal-title text-center' id='ModalECYL".$bus."'>".$listaTramitesBus[$bus][2]."</h4>
                        <br>
                            <h5>".$lang['Descripcion']."</h5>
                            <p>".$listaTramitesBus[$bus][4]."</p></br>
                            <h5>".$lang['Detalles']."</h5>
                            <p>".$listaTramitesBus[$bus][6]."</p></br>
                            <h5>".$lang['Telefono']."</h5>
                            <p>".$listaTramitesBus[$bus][5]."</p></br>
                            <h5>URL:</h5>
                            <p><a href=".$listaTramitesBus[$bus][3]." target='_blank'>".$lang['Iniciar Tramite']."</a></p></br>
                        </div>

                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>".$lang['Cerrar']."</button>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        echo "</div>";
    ?>