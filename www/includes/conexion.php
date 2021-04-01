<?php

//Conexión

$servidor = 'localhost';
$usuario = 'jovel';
$password = 'N89--pRwxxx';
$basededatos = 'jovel';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión
session_start();