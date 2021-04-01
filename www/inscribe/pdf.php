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

if (1){
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

		p#clausula_datos {
			font-size: .8rem;
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
			<h3>SOLICITUD DE INSCRIPCIÓN </h3>
			
		</div>
	</div>

	<div class="container text-center" id="solicitante">
		<br>
		<div style="background-color: #FFFCDC;">
			<h4> D./Dña. <b style="text-transform: uppercase;">'.$nombre.'&nbsp;'.$apellido1.'&nbsp;'.$apellido2.'</b>, con DNI <b style="text-transform: uppercase;">'.$dni.'</b></h4> 
			<h3><i>SOLICITO</i></h3> 
			<h4>la inscripción en la actividad:
			<b>ACOMPAÑAMIENTO DIGITAL Y CAPACITACIÓN PARA EL ACCESO A LA ADMINISTRACIÓN ELECTRÓNICA</b></h4>
		</div>
		<br>
		<div class="explicacion">
			<p class="text-justify justificado">
				Mis datos de contacto son:
			</p> 
			
			<p>Dirección: <b>'.$direccion.'</b></p>
			<p>Código Postal: <b>'.$cp.'</b></p>
			<p>Correo electrónico: <b>'.$email.'</b></p>
			<p>Teléfono: <b>'.$telef.'</b></p>
			 

			<div class="container" id="">
				<div class="col-xs-12">
					<div class="row fila">
						<!-- <div class="col-xs-1">
							<h4><i class="far fa-check-square"></i></h4>
						</div> -->
						<div class="col-xs-11 text-justify">
							<h5><img src="img/check-square-regular.png" width="20" alt="">
							&nbsp;<b>HE LEÍDO </b> la cláusula de protección de datos y 
							<b>DOY MI CONSENTIMIENTO</b> para el tratamiento de los mismos
							</h5>
							<p id="clausula_datos">
							De conformidad con lo dispuesto en el artículo 28 de la Ley 39/2015, de 1 de octubre, 
							de Procedimiento Administrativo Común de las Administraciones Publicas y en el artículo 6.1 a), c) y d)
							 y 9.2 h) del Reglamento (UE) 2016/679, de 27 de abril, 
							de Protección de Datos de Carácter Personal, se le informa de que con la presentación de esta solicitud 
							presta su consentimiento para el tratamiento de los datos de carácter personal contenidos en el impreso y obtenidos 
							en la tramitación del procedimiento. En consecuencia, el Ayuntamiento de León podrá obtener 
							directamente, de forma telemática o a través de otros medios, los datos necesarios 
							para prestar, en el ejercicio de las competencias de este organismo, la atención social demandada, 
							y entre otros los siguientes datos: identidad, salud, residencia, de Registro Civil, de la Agencia Tributaria, 
							de Entidades Gestoras de la Seguridad Social, de la Dirección General de Catastro y de otros organismos públicos. 
							Asimismo, se le informa que los datos de carácter personal 
							aportados a este formulario, así como a la documentación adjunta al mismo, serán incorporados a un 
							fichero de titularidad del Ayuntamiento de León a efectos de ser utilizados exclusivamente para la 
							gestión del correspondiente recurso que se solicita, pudiendo ejercer, en cualquier momento, su 
							derecho de acceso, rectificación, cancelación y oposición por medio de escrito dirigido al 
							Ayuntamiento de León, Avda. Ordoño II, nº 10 de León. Se le informa que los datos contenidos en esta 
							solicitud podrán ser incorporados al fichero automatizado “Usuarios de los Servicios Sociales de 
							Castilla y León”, de titularidad de la Gerencia de Servicios Sociales, pudiendo igualmente ejercer los 
							derechos de acceso, rectificación, cancelación y oposición ante la misma.
							
							</p>
						</div>
					</div>
				</div>
			</div>
			<br>

			<div class="container" id="">
				<div class="col-xs-12">
					<div class="row fila">
						<!-- <div class="col-xs-1">
							<h4><i class="far fa-check-square"></i></h4>
						</div> -->
						<div class="col-xs-11 text-justify">
							<h5><img src="img/check-square-regular.png" width="20" alt="">
							&nbsp;<b>SOLICITO </b>expresamente mi inscripción en la actividad de ACOMPAÑAMIENTO DIGITAL Y CAPACITACIÓN 
							PARA EL ACCESO A LA ADMINISTRACIÓN ELECTRÓNICA incluida 
							en el proyecto <b>"Apoyo para el acceso a la administración electrónica y reducción de la brecha 
								digital en la población más vulnerable de León".</b> 
							</h5>
						</div>
					</div>
				</div>
			</div>
			<br>

			<div class="container" id="">
				<div class="col-xs-12">
					<div class="row fila">
						<!-- <div class="col-xs-1">
							<h4><i class="far fa-check-square"></i></h4>
						</div> -->
						<div class="col-xs-11 text-justify">
							<h5><img src="img/check-square-regular.png" width="20" alt="">
							&nbsp;<b>SOLICITO </b> que los técnicos del proyecto se pongan en conmigo para establecer 
							el día y la hora para desarrollar la actividad de <b>ACOMPAÑAMIENTO DIGITAL Y CAPACITACIÓN 
							PARA EL ACCESO A LA ADMINISTRACIÓN ELECTRÓNICA</b>.
							</h5>
						</div>
					</div>
				</div>
			</div>
			<br>
			
		</div>
		
	</div>

	<div class="container" id="">
		<div class="col-xs-12">
			<div class="row fila">
				
				<div class="col-xs-12 text-center">
					
					<p>Firmo en León, a 
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
					<img id="firma" style="heigth: 3rem;" src="'.$firma.'" /> 
				</div>
			</div>
		</div>
	</div>

</div>	

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
</body>     
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
    
    // send by mail
    if (1){

		
        $pdf=$mpdf->Output('formulario.pdf', 'S');
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
	    //$mail->Host = gethostname();
	    $mail->Host = "spaceseven.redmoebius.com";
            $mail->SMTPAuth = true;
			$mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Username = 'info@puertasdigitales.es';
            $mail->Password = '[Leon20]';
            $mail->setFrom('info@puertasdigitales.es');
			$mail->addBCC('info@puertasdigitales.es');
			$mail->addBCC('lisho240707@gmail.com');
			$mail->addBCC('pcos.rafael@gmail.com');
			$mail->addBCC('pcos.anamaria@gmail.com');
			/* $mail->addBCC('rafael.francisco@aytoleon.es');
			$mail->addBCC('anamaria.fernandez.c@aytoleon.es'); */
            if ($email!="") $mail->addAddress($email); // enviar copia al remitente
            $mail->Subject = 'Solicitud inscripción para acompañamiento digital de '.
								$nombre.' '.$apellido1.' '.$apellido2;
            $mail->Body    = 'Adjuntando solicitud de inscripción en la actividad 
								<b>ACOMPAÑAMIENTO DIGITAL Y CAPACITACIÓN PARA EL ACCESO A LA 
								ADMINISTRACIÓN ELECTRÓNICA</b>
								<p>Solicitante:<span style="text-transform: uppercase;">'.$nombre.' '.$apellido1.' '.$apellido2.'</span></p>
								<p>Dni:<span style="text-transform: uppercase;">'.$dni.'</span></p>
								<p>Dirección:<span style="text-transform: uppercase;">'.$direccion.' ('.$cp.')</span></p>
								<p>Teléfono de contacto:<span style="text-transform: uppercase;">'.$telef.'</span></p>
								<p>Email:<span>'.$email.'</span></p>
								<hr>
								<br>Esta solicitud se ha generado 
								automáticamente a través de http://www.puertasdigitales.es/inscribe.';
            $mail->addStringAttachment($pdf, 'solicitud_'.$dni.'.pdf');
            
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
