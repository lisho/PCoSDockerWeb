<?php
include('lang/'.$_POST['lang'].'.php');

//Conectamos con la base de datos en la que vamos a buscar
   $connect = mysqli_connect("db", "jovel", "N89--pRwxxx","jovel"); // servidor, user, pass, base
   mysqli_set_charset($connect, "utf8");

   $tabla="Pagina_".$_POST['lang']; 

   $buscar = $_POST['palabra'];

    $query = "SELECT * FROM $tabla WHERE Etiquetas LIKE '%$buscar%' ORDER BY ID";
    $resultset = mysqli_query($connect, $query) or die("error base de datos:". mysqli_error($connect));
    $listaTramitesBus= array();
        while($Tablabus = mysqli_fetch_array($resultset))
        array_push($listaTramitesBus, $Tablabus);

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
                            <h4 class='modal-title text-center' id='ModalB".$bus."'>".$listaTramitesBus[$bus][2]."</h4>
                            <br>
                            <h5>".$lang['Descripcion']."</h5>
                            <p>".$listaTramitesBus[$bus][4]."</p></br>
                            <h5>".$lang['Detalles']."</h5>
                            <p>".$listaTramitesBus[$bus][6]."</p></br>
                            <h5>".$lang['Telefono']."</h5>
                            <p>".$listaTramitesBus[$bus][5]."</p></br>
                            <h5>URL:</h5>
                            <p><a href=".$listaTramitesBus[$bus][3]." target='_blank'>".$lang['Iniciar Tramite']."</a></p>
                            </br>
        
                            <div class='row justify-content-center'>
                                <button type='button' class='btn btn-primary' data-dismiss='modal' data-uw-styling-context='true'>".$lang['Cerrar']."</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        
    ?>


                     