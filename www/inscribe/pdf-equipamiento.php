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
    /* if (isset($_POST['estado'])) $estado=$_POST['estado']; else $estado="";
    if (isset($_POST['direccion'])) $direccion=$_POST['direccion']; else $direccion="";
    if (isset($_POST['cp'])) $cp=$_POST['cp']; else $cp="";
    if (isset($_POST['email'])) $email=$_POST['email']; else $email="";
    if (isset($_POST['phone'])) $telef=$_POST['phone']; else $telef=""; */
    
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
    
    table{border-collapse:collapse;}
    .table{width:100%;margin-bottom:1rem;color:#212529;}
    .table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6;}
    .table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6;}
    .table-bordered{border:1px solid #dee2e6;}
    .table-bordered td,.table-bordered th{border:1px solid #dee2e6;}
    .table-bordered thead th{border-bottom-width:2px;}
    .table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;}
    .table-responsive>.table-bordered{border:0;}
    thead{display:table-header-group;}
/*
    @media print{
    *,::after,::before{text-shadow:none!important;box-shadow:none!important;}
    thead{display:table-header-group;}
    img,tr{page-break-inside:avoid;}
    p{orphans:3;widows:3;}
    body{min-width:992px!important;}
    .container{min-width:992px!important;}
    .table{border-collapse:collapse!important;}
    .table td,.table th{background-color:#fff!important;}
    .table-bordered td,.table-bordered th{border:1px solid #dee2e6!important;}
    }
*/
		.titulo_campo {
			border-bottom: 1px solid #808080;
			padding-bottom: 5px;
			/*background-color: #999999;*/
			color: #808080;
		}
		.recuadro {
			border: 1px solid #555;
			padding: 20px;
		}
		.fila {
			margin-bottom: 5px;
		}

		#logo_ayto {
			height: 7rem;
		}

		footer {
			padding: 50px;
		}
	</style>
    
    </head>
<body>

	<header id="header" class="col-xs-12">
		<div class="container">
			<img src="img/logo_ayto_1.svg" id="logo_ayto" alt="">
			
		</div>
	</header><!-- /header -->

	<div class="container"  style="margin-top:40px">
		<div class="row">
			<div class="text-center" id="titulo">

				<h3>Autorización para el uso de datos personales </h3>
				
			</div>
		</div>
		<hr>
		<div class="container" id="solicitante">
			<h4> D./Dña. '.$nombre.'&nbsp;'.$apellido1.'&nbsp;'.$apellido2.', con DNI n</h4>
		</div>

';

$html.='

		<div class="container" id="">
			<div class="col-xs-12">
				<div class="row fila">
					
					<div class="col-xs-11 text-justify">
						<h5><b></b>HE RECIBIDO el siguiente equipamiento para su uso en el marco de mi desempeño profesional:</b>
                        </h5>
                        <p></p>

                        <p>'.$equipamiento.'</p>
					</div>
				</div>
			</div>
		</div>
		<br>


		
		<div class="container" id="">
			<div class="col-xs-12">
				<div class="row fila">
					
					<div class="col-xs-12 text-center">
						<p>Y para que conte a los efectos oportunos, </p>
						<p>Firma en León, a 
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
						<img src="'.$firma.'" />
					</div>
				</div>
			</div>
		</div>
		<br>


	</div>	

	<footer class="text-right">
		<div class="container">
			<p>ILMO. SR. ALCALDE DEL EXCMO. AYUNTAMIENTO DE LEÓN</p>
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
            $mail->Host = gethostname();
            $mail->SMTPAuth = true;
            $mail->CharSet = 'UTF-8';
            $mail->Username = 'info@puertasdigitales.es';
            $mail->Password = '[Leon20]';
            $mail->setFrom('info@puertasdigitales.es');
			$mail->addAddress('info@puertasdigitales.es');
			$mail->addAddress('lisho240707@gmail.com');
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
