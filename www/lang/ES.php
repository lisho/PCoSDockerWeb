<?php

// Conectar a la base de datos
$connect = mysqli_connect("db", "jovel", "N89--pRwxxx","jovel"); // servidor, user, pass, base
mysqli_set_charset($connect, "utf8");

$tabla="Pagina_ES";


            $sql_query = "SELECT * FROM $tabla ORDER BY ID";
            $resultset = mysqli_query($connect, $sql_query) or die("error base de datos:". mysqli_error($connect));
            $results= array();
            while($TablaES = mysqli_fetch_array($resultset))
                array_push($results, $TablaES);
             
?>


<?php
$lang = array(
  "titulo" => "Bienvenidos a PCoS",
  "Menu" => "Men&uacute;",
  "Tramites" => "Tr&aacute;mites",
  "Ubicacion" => "Ubicaci&oacute;n",
  "Contacto" => "Contacto",
  "Equipo" => "Equipo",
  "Equipo del Proyecto" => "Equipo",
  "TRAMITES" => "TR&Aacute;MITES",
  "Dtitulo" => "Todos tus tr&aacute;mites administrativos en un solo lugar.",
  "Telefono de atencion" => "Tel&eacute;fono de atenci&oacute;n",
  "Descripcion" => "Descripci&oacute;n",
  "Detalles" => "Detalles",
  "Iniciar Tramite" => "Pulsa aqu&iacute; para realizar el tr&aacute;mite.",
  "Cerrar" => "Cerrar",
  "UBICACION" => "UBICACI&Oacute;N",
  "UBICACION Y HORARIOS" => "UBICACI&Oacute;N Y HORARIOS",
  "Ubicacion Actual" => "Ubicaci&oacute;n Actual",
  "Ubicacion Manual" => "Ubicaci&oacute;n Manual",
  "Horarios" => "Horarios",  
  "Ubicacion 1" => "Centro Social: La Asunci&oacute;n - Ventas Este",
  "Ubicacion 2" => "Centro C&iacute;vico: Le&oacute;n Oeste",
  "Ubicacion 3" => "Centro Social: Edificio Canseco",
  "Ubicacion 4" => "Centro Social: La Serna",
  "CONTACTO" => "CONTACTO",
  "Telefono" => "Tel&eacute;fono",
  "Correo Electronico" => "Correo Electr&oacute;nico",
  "Mensaje Directo" => "Mensaje Directo",
  "Nombre" => "Nombre",
  "Apellidos" => "Apellidos",
  "Mensaje" => "Mensaje",
  "Enviar" => "Enviar",
  "Borrar" => "Borrar",
  "EQUIPO DE PROYECTO" => "EQUIPO DE PROYECTO",
  "Contenido equipo proyecto" => "Zona reservada para el equipo de proyecto.",
  "Contenido equipo proyecto2" => "Pr&oacute;ximamente en funcionamiento.",
  "Asistente Social" => "Asistente Social",
  "Tecnico Informatico" => "T&eacute;cnico Inform&aacute;tico",
  "Coordinador Administrativo" => "Coordinador Administrativo",
  "Opciones" => "Opciones",
  "Descargas" => "Descargas",
  "Buscar" => "Buscar",
  "Busqueda" => "Busqueda",
  "Mostrar Resultados" => "Mostar Resultados",
  "Palabras Clave" => "Palabras Clave",
  "Contrasena" => "Contrase&ntilde;a",
  "Registro" => "Registro",
  "DNI" => "NIF/NIE",
  "Fecha Nacimiento" => "Fecha Nacimiento",
  "Copyright 2021 Ayuntamiento de Leon. Todos los derechos reservados." => "Copyright &copy; 2021 Ayuntamiento de Le&oacute;n. Todos los derechos reservados.",
  "Organizaciones colaboradoras" => "Organizaciones colaboradoras",
  "Nuestros datos" => "Nuestros datos",
  "Direccion" => "Direcci&oacute;n",
  "Otros contactos" => "Otros modos de contacto",
  "Datos de Contacto" => "Datos de Contacto",
  "Nuestros Datos" => "Nuestros Datos",
  "Proteccion de Datos" => "Protecci&oacute;n de Datos",
  "Enlaces de interes" => "Enlaces de inter&eacute;s",
  "Ayuntamiento de Leon" => "Ayuntamiento de Le&oacute;n",
  "Acceso" => "Acceso",
  "Idioma" => "Idioma",
  "Tamano de letra" => "Tama&ntilde;o de letra",
  "Pequena" => "Pequeña",
  "Mediana" => "Mediana",
  "Grande" => "Grande",
  "Select" => "Selecci&#243;n",
  "Espanol" => "Espa&ntilde;ol",
  "Ingles" => "English",
  "Frances" => "Fran&#231;ais",
);
?>