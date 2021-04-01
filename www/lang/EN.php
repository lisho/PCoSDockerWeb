<?php

// Conectar a la base de datos
$connect = mysqli_connect("localhost", "jovel", "N89--pRwxxx","jovel"); // servidor, user, pass, base
mysqli_set_charset($connect, "utf8");

$tabla="Pagina_EN";


            $sql_query = "SELECT * FROM $tabla ORDER BY ID";
            $resultset = mysqli_query($connect, $sql_query) or die("error base de datos:". mysqli_error($connect));
            $results= array();
            while($TablaEN = mysqli_fetch_array($resultset))
                array_push($results, $TablaEN);
  
           
?>


<?php
$lang = array(
  "titulo" => "Welcome to PCoS",
  "Menu" => "Menu",
  "Tramites" => "Services",
  "Ubicacion" => "Location",
  "Contacto" => "Contact",
  "Equipo" => "Team",
  "Equipo del Proyecto" => "Team",
  "TRAMITES" => "SERVICES",
  "Dtitulo" => "All your administrative procedures in a single place.",
  "Telefono de atencion" => "Attention phone",
  "Descripcion" => "Description",
  "Detalles" => "Details",
  "Iniciar Tramite" => "Tap here to start the procedure.",
  "Cerrar" => "Close",
  "UBICACION" => "LOCATION",
  "UBICACION Y HORARIOS" => "LOCATION AND OPENING HOURS",
  "Ubicacion Actual" => "Current Location",
  "Ubicacion Manual" => "Manual Location",
  "Horarios" => "Schedule",
  "Ubicacion 1" => "Social Center: La Asunci&oacute;n - Ventas Este",
  "Ubicacion 2" => "Civic Center: Le&oacute;n Oeste",
  "Ubicacion 3" => "Social Center: Edificio Canseco",
  "Ubicacion 4" => "Social Center: La Serna",
  "CONTACTO" => "CONTACT INFORMATION",
  "Telefono" => "Phone",
  "Correo Electronico" => "E-Mail",
  "Mensaje Directo" => "Direct Message",
  "Nombre" => "Name",
  "Apellidos" => "Surname",
  "Mensaje" => "Content of the Message",
  "Enviar" => "Send",
  "Borrar" => "Delete",
  "EQUIPO DE PROYECTO" => "TEAM PROYECT",
  "Contenido equipo proyecto" => "Reserved area for the team proyect.",
  "Contenido equipo proyecto2" => "Operating very soon.",
  "Asistente Social" => "Social Worker",
  "Tecnico Informatico" => "Systems Engineer",
  "Coordinador Administrativo" => "Administrative Coordinator",
  "Opciones" => "Options",
  "Descargas" => "Downloads",
  "Buscar" => "Search",
  "Busqueda" => "Search",
  "Mostrar Resultados" => "Show Results",
  "Palabras Clave" => "Keywords",
  "Contrasena" => "Password",
  "Registro" => "Registry",
  "DNI" => "NIF/NIE",
  "Fecha Nacimiento" => "Birthday",
  "Copyright 2021 Ayuntamiento de Leon. Todos los derechos reservados." => "Copyright &copy; 2021 Le&oacute;n Town Hall. All rights reserved.",
  "Organizaciones colaboradoras" => "Collaborating organizations",
  "Nuestros datos" => "About us",
  "Direccion" => "Address",
  "Otros contactos" => "Other methods of contact",
  "Datos de contacto" => "Contact data",
  "Proteccion de Datos" => "Data Protection",
  "Enlaces de interes" => "Links of interest",
  "Ayuntamiento de Leon" => "Le&oacute;n Town Hall",
  "Acceso" => "Access",
  "Idioma" => "Language",
  "Tamano de letra" => "Captions Size",
  "Pequena" => "Small",
  "Mediana" => "Medium",
  "Grande" => "Big",
  "Select" => "Select",
  "Espanol" => "Espa&ntilde;ol",
  "Ingles" => "English",
  "Frances" => "Fran&#231;ais",
);
?>