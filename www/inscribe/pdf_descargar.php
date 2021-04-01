<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

session_start();

if (0){
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
}

if (0){
if(isset($_SESSION['ip'])&&isset($_SESSION['time'])){
    $before=$_SESSION['time'];
    $now=time();
    $difference=$now-$before;
    if ($difference<121){ // 2 minutes
        echo "No puede enviar otro mensaje hasta transcurridos 2 minutos";
        return;
    }
}
$_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
$_SESSION['time']=time(); // timestamp
}

if (0){
    echo "<pre>";
    print_r ($_POST);
    print_r ($_FILES);
    echo "</pre>";
    
    foreach ($_FILES as $a=>$b) {
        echo $a."<br>";
        $tmp_name = $_FILES[$a]["tmp_name"];
        $name = basename($_FILES[$a]["name"]);
        //$id=session_id();
        $id=basename($tmp_name);
        $base = "/home/puertasdigitales.es/files/".$id."_";
/*
        // rename if file exists
        $number=1;
        $name_temp=$name;
        while (file_exists($name_temp)){
            echo $name_temp."<br>";
            $number++;
            $name_temp=$name."(".$number.")";
        }
        $name=$name_temp;
*/
        $name2 = $base.$name;
        echo $tmp_name."<br>";
        echo $name2."<br>";
        //move_uploaded_file($tmp_name, $name2);
        //$mail->AddAttachment($tmp_name, $name2);
    }
    
    return;
}

try {
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->debug = true;

	if (0){
	$url = urldecode('plantilla_solicitud_2.html');


	// For $_POST i.e. forms with fields
	if (count($_POST) > 0) {

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1 );

		foreach($_POST as $name => $post) {
		$formvars = array($name => $post . " \n");
		}

		curl_setopt($ch, CURLOPT_POSTFIELDS, $formvars);
		$html = curl_exec($ch);
		curl_close($ch);

	} elseif (ini_get('allow_url_fopen')) {
		$html = file_get_contents($url);

	} else {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , 1 );
		$html = curl_exec($ch);
		curl_close($ch);
	}

	$mpdf->useSubstitutions = true; // optional - just as an example
	//$mpdf->SetHeader($url . "\n\n" . 'Page {PAGENO}');  // optional - just as an example
	//$mpdf->CSSselectMedia='mpdf'; // assuming you used this in the document header
	$mpdf->setBasePath($url);
	$mpdf->WriteHTML($html);
	$mpdf->Output();

	return;
}
    
    if (isset($_POST['nombre'])) $nombre=$_POST['nombre']; else $nombre="";
    if (isset($_POST['apellido1'])) $apellido1=$_POST['apellido1']; else $apellido1="";
    if (isset($_POST['apellido2'])) $apellido2=$_POST['apellido2']; else $apellido2="";
    if (isset($_POST['dni'])) $dni=$_POST['dni']; else $dni="";
    /* if (isset($_POST['estado'])) $estado=$_POST['estado']; else $estado="";*/
    if (isset($_POST['direccion'])) $direccion=$_POST['direccion']; else $direccion="";
    if (isset($_POST['cp'])) $cp=$_POST['cp']; else $cp="";
    if (isset($_POST['email'])) $email=$_POST['email']; else $email="";
    if (isset($_POST['phone'])) $telef=$_POST['phone']; else $telef=""; 
    
    if (isset($_POST['firma'])) $firma=$_POST['firma']; else $firma="";

   /*  $cuentafamiliares=0;
    foreach ($_POST as $key=>$val) {
        if ( (substr($key, 0, 3) == 'dni') && (strlen($key)>3) && (strlen($val)>0) ) {
            //echo $key.":".$_POST[$key]."<br>";
            $cuentafamiliares++;
        }
    }
    for ($i = 0; $i < $cuentafamiliares; $i++) {
        $nombrevar="dni".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
        $nombrevar="nombre".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
        $nombrevar="nacimiento".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
        $nombrevar="relacion".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
        $nombrevar="laboral".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
        $nombrevar="autorizo_laboral".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
    }

    if (isset($_POST['ingresos'])) $ingresos=$_POST['ingresos']; else $ingresos="";
    if (isset($_POST['cuenta_banco'])) $cuenta_banco=$_POST['cuenta_banco']; else $cuenta_banco="";
    if (isset($_POST['notificaciones'])) $notificaciones=$_POST['notificaciones']; else $notificaciones="";
    if (isset($_POST['nueva_direccion'])) $nueva_direccion=$_POST['nueva_direccion']; else $nueva_direccion=""; */

    /* bootstrap grid working using bootstrap 3 css and asuming column width 12 and columns inside width is 10 */
    
    $html='
    <head>
    <link href="bootstrap336.css" rel="stylesheet"">
    <link href="fontawesome-free-5.13.0-web/css/regular.css" rel="stylesheet">
    <link href="fontawesome-free-5.13.0-web/css/fontawesome.min.css" rel="stylesheet">
	<link href="fontawesome-free-5.13.0-web/css/brands.css" rel="stylesheet">
	<link href="fontawesome-free-5.13.0-web/css/solid.css" rel="stylesheet">
	<link href="fontawesome-free-5.13.0-web/css/regular.css" rel="stylesheet">
    <style>
    
    <style>
        .titulo_campo {
			border-bottom: 1px solid #808080;
			padding-bottom: 5px;
			/*background-color: #999999;*/
			color: #808080;
        }

		div#titulo > h4 {
			text-transform: uppercase;
		}

        p {
            font-size: 1rem;
        }
        .primer_container{
            margin: 10px 50px 10px 50px !important;
        }
        .primer_container > div > div > h2{
            font-weight: 900;
            color: #2f4f4f;
            text-shadow: #555;
        }
		.recuadro {
			border: 1px solid #555;
			padding: 20px;
        }
        p.clausula{
            color: #808080;
            font-size: 1rem;
        }
        p.justificado {
            text-indent: 40px;
            text-align: justify;
        }
        .explicacion > p,
        #solicitante > div > ol > li > p{
            font-size: 1.4rem;
        }

        div.logo_modal_flex{
            display: flex;
        }

        img.logo_modal {
            height: 3rem;
            width: auto;
            padding: 8px 8px;
        }
        div.container_logos_fila{
            display: inline-flex;
        }
        #container_logos {
            text-align: center;
        }
		.fila {
			margin-bottom: 5px;
		}

		h3#actividad {
			color: #555555;
		}

		#logo_ayto {
			height: 8rem;
		}

		footer {
			padding: 50px;
		}
	</style>
    
	</style>
    
    </head>
<body>

<header id="header" class="col-xs-12">
<div class="container">
    <img src="img/logo_ayto_1 copy.svg" id="logo_ayto" alt="">
    <!-- <hr/> -->
</div>
</header>

<div class="primer_container"  style="margin-top:20px">
	<div class="row">
		<div class="text-center" id="titulo">
			<h4 style="text-transform: uppercase; color: #900C3F;"><b>Proyecto de apoyo para el acceso a la administración 
			electrónica y reducción de la brecha digital</b></h4>
			<h3>JUSTIFICANTE DE INSCRIPCIÓN </h3>
			
		</div>
	</div>

	<div class="container text-center" id="solicitante">
		<br>
		<div style="background-color: #FFFCDC;">
			<h4> D./Dña. <b style="text-transform: uppercase;">'.$nombre.'&nbsp;'.$apellido1.'&nbsp;'.$apellido2.'</b>, con DNI <b style="text-transform: uppercase;">'.$dni.'</b> 
			ha quedado inscrito correctamente en la actividad:</h4>
			<h3 id="actividad"><b>ACOMPAÑAMIENTO DIGITAL Y CAPACITACIÓN PARA EL ACCESO A LA ADMINISTRACIÓN ELECTRÓNICA</b></h3>
		</div>
		<br>
		<div class="explicacion">
			<p class="text-justify justificado">
				El personal municipal responsable del desarrollo del proyecto se pondrá en contacto con usted a partir del 
				día 1 de marzo de 2021 y concertará cita previa para el desarrollo de la actividad. Para ello se utilizará la
				información aportada en la solicitud de inscripción.
			</p>        
			<p class="text-justify">
				El contenido de la actividad será el siguiente:
			</p> 
			<ol>
				<li><p class="text-justify">Apoyo para obtener la <b class="rojo">identificación mediante cl@ve</b> utilizando el DNIe.</p>
				</li>
				
				<li><p class="text-justify">Formación para aprender el <b class="rojo">manejo básico del correo electrónico </b> utilizando el dispositivo del que dispone cada persona para realizar
					los trámites a través de internet</p></li>
				
			</ol>
		</div>
		
	</div>

	<div class="container" id="">
		<div class="col-xs-12">
			<div class="row fila">
				
				<div class="col-xs-12 text-center">
					
					<p><!-- En León, a -->
					';
					date_default_timezone_set('Europe/Amsterdam');

					$fecha = date("d-m-Y H:i:s");
					$fecha = substr($fecha, 0, 10);
					$numeroDia = date('d', strtotime($fecha));
					$dia = date('l', strtotime($fecha));
					$mes = date('F', strtotime($fecha));
					$anio = date('Y', strtotime($fecha));
					$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
					$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
					$nombredia = str_replace($dias_EN, $dias_ES, $dia);
					$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
					$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
					$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
					$today= $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;

					$html.= $today.'</p>
					<!-- <img id="firma" style="heigth: 3rem;" src="'.$firma.'" /> -->
				</div>
			</div>
		</div>
	</div>

</div>	  
<div style="margin-bootom: 350px"></div>
</body>  
';

$footer = '
    <footer class="">
    <hr>
    <div id="container_logos" class="row justify-content-center align-items-center">
        <div class="container_logos_fila">
            <img src="./img/logo_FSE.svg" class="logo_modal" alt="">
            <img src="./img/logo_ayto_1 copy.svg" class="logo_modal" alt="">
            <img src="./img/logo_jcyl.svg" class="logo_modal" alt="">
            <img src="./img/logo_ecyl.svg" class="logo_modal" alt="">
        </div>
        <div class="container_logos_fila">
            <img src="./img/logo_garantia.png" class="logo_modal" alt="">
            <img src="./img/logo_edis_1.svg" class="logo_modal" alt="">
            <img src="./img/logo_puertas_digitales.svg" class="logo_modal" alt="">
        </div>
    </div>
    </footer>
 
';


    /*
    [declaro_cierto] => on
    [comprometo] => on
    [leido] => on
    [declaro_informado] => on
    */ 

    // generar pdf
    if (1){
        $mpdf->WriteHTML($html);
        $mpdf->SetHTMLFooter($footer);
        //$mpdf->Output();
/*    
    echo
        "<script language='JavaScript'>
            window.alert('Solicitud enviada');
            window.location.href='https://puertasdigitales.es/aus';
        </script>"
    ;
*/    
    }
    
    $mpdf->Output();

    // send by mail
    if (0){

		
        $pdf=$mpdf->Output('formulario.pdf', 'S');
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = gethostname();
            $mail->SMTPAuth = true;
            $mail->CharSet = 'UTF-8';
            $mail->Username = 'info@puertasdigitales.es';
            $mail->Password = '[Leon20]';
            $mail->setFrom('info@puertasdigitales.es');
			$mail->addBCC('info@puertasdigitales.es');
			$mail->addBCC('lisho240707@gmail.com');
            if ($email!="") $mail->addAddress($email); // enviar copia al remitente
            $mail->Subject = 'Solicitud AUS';
            $mail->Body    = 'Adjuntando solicitud AUS y documentación requerida. Esta solicitud se ha generado automáticamente a través del portal http://www.puertasdigitales.es/aus del Excmo. Ayuntamiento de León.';
            $mail->addStringAttachment($pdf, 'formulario.pdf');
            
            foreach ($_FILES as $a=>$b) {
                $tmp_name = $_FILES[$a]["tmp_name"];
                $name = basename($_FILES[$a]["name"]);
                $id=basename($tmp_name);
                $name2 = $id."_".$name;
                $mail->AddAttachment($tmp_name, $name2); // attach uploaded file without saving to permanent file from tmp (tmp is inmediately deleted after upload process)
            }
            
			$result = $mail->send();
			//$mpdf->Output();
			
            echo $mpdf->Output('formulario.pdf', "S");
        } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
        }        
    }
    
}
catch (\Mpdf\MpdfException $e) {
    echo $e->getMessage();
}
