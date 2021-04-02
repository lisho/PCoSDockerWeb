<?php

// Conectar a la base de datos
$connect = mysqli_connect("db", "jovel", "N89--pRwxxx","jovel"); // servidor, user, pass, base
mysqli_set_charset($connect, "utf8");

$tabla="Pagina_FR";


            $sql_query = "SELECT * FROM $tabla ORDER BY ID";
            $resultset = mysqli_query($connect, $sql_query) or die("error base de datos:". mysqli_error($connect));
            $results= array();
            while($TablaFR = mysqli_fetch_array($resultset))
                array_push($results, $TablaFR);
  
           
?>


<?php
$lang = array(
  "titulo" => "Bienvenue au PCoS",
  "Menu" => "Menu",
  "Tramites" => "Formalit&#233;",
  "Ubicacion" => "Lieu",
  "Contacto" => "Contact",
  "Equipo" => "&#201;quipe",
  "Equipo del Proyecto" => "&#201;quipe",
  "TRAMITES" => "FORMALIT&#201;S",
  "Dtitulo" => "Toutes vos d&#233;marches administratives en un seul endroit.",
  "Telefono de atencion" => "Attention T&#233;l&#233;phone",
  "Descripcion" => "La description",
  "Detalles" => "Des d&#233;tails",
  "Iniciar Tramite" => "Lancer des proc&#233;dures",
  "Cerrar" => "Fermer",
  "UBICACION" => "LIEU",
  "UBICACION Y HORARIOS" => "LIEU ET HORAIRES",
  "Ubicacion Actual" => "Situation actuelle",
  "Ubicacion Manual" => "localisation manuelle",
  "Horarios" => "Horaires",  
  "Ubicacion 1" => "Centre Social: La Asunci&oacute;n - Ventas Este",
  "Ubicacion 2" => "Centre Civique: Le&oacute;n Oeste",
  "Ubicacion 3" => "Centre Social: Edificio Canseco",
  "Ubicacion 4" => "Centre Social: La Serna",
  "CONTACTO" => "CONTACT",
  "Telefono" => "T&#233;l&#233;phone",
  "Correo Electronico" => "Courrier &#201;lectronique",
  "Mensaje Directo" => "Message Direct",
  "Nombre" => "Nom",
  "Apellidos" => "pr&#233;nom",
  "Mensaje" => "Message",
  "Enviar" => "Envoyer",
  "Borrar" => "Effacer",
  "EQUIPO DE PROYECTO" => "Projet de Groupe",
  "Contenido equipo proyecto" => "Zone r&eacute;serv&eacute;e &agrave; l'&eacute;quipe projet.",
  "Contenido equipo proyecto2" => "Bient&ocirc;t en service.",
  "Asistente Social" => "Assistant social",
  "Tecnico Informatico" => "Technicien en informatique",
  "Coordinador Administrativo" => "Coordonnateur administratif",
  "Opciones" => "Les choix",
  "Descargas" => "t&#233;l&#233;chargements",
  "Buscar" => "Chercher",
  "Busqueda" => "Recherche",
  "Mostrar Resultados" => "Montrer les r&#233sultats",
  "Palabras Clave" => "Mots-cl&#233s",
  "Contrasena" => "Mot de passe",
  "Registro" => "Enregistrement",
  "DNI" => "NIF/NIE",
  "Fecha Nacimiento" => "Date de naissance",
  "Copyright 2021 Ayuntamiento de Leon. Todos los derechos reservados." => "Copyright &copy; 2021 Conseil municipal de L&#233;on. Tous droits r&#233;serv&#233;s.",
  "Organizaciones colaboradoras" => "Organisations collaboratrices",
  "Nuestros datos" => "Nos donn&#233;es",
  "Direccion" => "Adresse",
  "Otros contactos" => "Autres modes de contact",
  "Datos de contacto" => "Informations de contact",
  "Proteccion de Datos" => "Protection des donn&#233;es",
  "Enlaces de interes" => "Liens d'int&#233;r&#234;t",
  "Ayuntamiento de Leon" => "Conseil municipal de L&#233;on",
  "Acceso" => "Acc&eacute;der",
  "Idioma" => "Langage",
  "Tamano de letra" => "Format Lettre",
  "Pequena" => "Petite",
  "Mediana" => "M&#233;dian",
  "Grande" => "Grand",
  "Select" => "S&#233;lectionner",
  "Espanol" => "Espa&ntilde;ol",
  "Ingles" => "English",
  "Frances" => "Fran&#231;ais",
);
?>