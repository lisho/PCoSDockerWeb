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
    //session_regenerate_id();

    $cuentafamiliares=0;
    foreach ($_POST as $key=>$val) {
        if ( (substr($key, 0, 3) == 'dni') && (strlen($key)>3) && (strlen($val)>0) ) {
            //echo $key.":".$_POST[$key]."<br>";
            $cuentafamiliares++;
        }
    }
    for ($i = 0; $i < $cuentafamiliares; $i++) {
        $nombrevar="dni".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar=""; echo "<br>".$nombrevar.":".$$nombrevar;
        $nombrevar="nombre".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
        $nombrevar="nacimiento".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
        $nombrevar="relacion".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
        $nombrevar="laboral".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
        $nombrevar="autorizo_laboral".$i; if (isset($_POST[$nombrevar])) $$nombrevar=$_POST[$nombrevar]; else $$nombrevar="";
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
    if (isset($_POST['estado'])) $estado=$_POST['estado']; else $estado="";
    if (isset($_POST['direccion'])) $direccion=$_POST['direccion']; else $direccion="";
    if (isset($_POST['cp'])) $cp=$_POST['cp']; else $cp="";
    if (isset($_POST['email'])) $email=$_POST['email']; else $email="";
    if (isset($_POST['phone'])) $telef=$_POST['phone']; else $telef="";
    
    if (isset($_POST['firma'])) $firma=$_POST['firma']; else $firma="";

    $cuentafamiliares=0;
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
    if (isset($_POST['nueva_direccion'])) $nueva_direccion=$_POST['nueva_direccion']; else $nueva_direccion="";

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

				<h2>Declaración responsable para la solicitud de Ayudas de Urgencia Social (AUS) mediante procedimiento extraordinario durante el estado de alarma sanitaria por COVID-19 </h2>
				
			</div>
		</div>
		<hr>
		<div class="container" id="solicitante">
			<h4>Datos de la persona solicitante</h4>
		</div>

		<div class="recuadro">
			<div class="col-xs-12">
				<div class="row fila">

					<div class="col-xs-12">
						<p class="titulo_campo">Primer apellido</p>
						<h5>'.$apellido1.'</h5>						
					</div>

					<div class="col-xs-12">
						<p class="titulo_campo">Segundo apellido</p>
						<h5>'.$apellido2.'</h5>
					</div>

					<div class="col-xs-12">
						<p class="titulo_campo">Nombre</p>
						<h5>'.$nombre.'</h5>
					</div>
					
                </div>
			</div>

			<div class="col-xs-12">
				<div class="row fila">

					<div class=" col-xs-5">
						<p class="titulo_campo">DNI/NIE/Otro documento de identificación</p>
						<h5>'.$dni.'</h5>						
					</div>

					<div class="col-xs-5">
						<p class="titulo_campo"><br>Estado civil</p>
						<h5>'.$estado.'</h5>
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="row fila">
					<div class=" col-xs-12">
						<p class="titulo_campo">Dirección</p>
						<h5>'.$direccion.'</h5>						
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="row fila">
					<div class=" col-xs-5">
						<p class="titulo_campo">Código postal</p>
						<h5>'.$cp.'</h5>						
					</div>

					<div class="col-xs-5">
						<p class="titulo_campo">Localidad</p>
						<h5>León</h5>
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="row fila">
					<div class=" col-xs-5">
						<p class="titulo_campo">Teléfono de contacto</p>
						<h5>'.$telef.'</h5>						
					</div>

					<div class="col-xs-5">
						<p class="titulo_campo">Correo electrónico</p>
						<h5>'.$email.'</h5>
					</div>

				</div>
			</div>
		</div>
		<br>

<pagebreak />
		
		<div class="container" id="notificaciones">
			<h4>Dirección a efectos de notificaciones</h4>
		</div>

		<div class="recuadro">
			<div class="container">
				<div class="col-xs-12">
					<p class="titulo_campo">Deseo recibir las nostificaciones relacionadas con este procedimiento...</p>
				</div>
				
				<div class="container">
					<h5>'.$notificaciones.'</h5>
				</div>
				<br>
				<div class="col-xs-12">
					<p class="titulo_campo">Dirección a efectos de notificaciones</p>
					<h5>'.$nueva_direccion.'</h5>
				</div>
				
			</div>
		</div>
		<br>

		<div class="container" id="familiares">
			<h4>Datos familiares</h4>
		</div>

		<div class="recuadro">
			<div class="container">
				<div class="col-xs-12">
					<p class="titulo_campo">Personas que figuran empadronadas en el mismo domicilio y que autorizan a recabar los datos referentes a su capacidad económica:</p>
				</div>
';
if ($cuentafamiliares){
/*
$html.= '<br>'.$cuentafamiliares.'<br>';
if (0){
*/
$html.='
				<div class="container">
					<div class="table-responsive">
						<table class="table table-bordered text-center">
						  
						  <thead class="thead-dark|thead-light">
						    <tr>
						      <th scope="col">Parentesco con la persona solicitante</th>
						      <th scope="col">Nombre y apellidos</th>
						      <th scope="col">DNI/NIE</th>
						      <th scope="col">Fecha de nacimiento</th>
						      <th scope="col">Situación laboral actual</th>
						      <th scope="col">Autoriza a recabar sus datos</th>
						    </tr>
						  </thead>
						  <tbody>
        ';

        for ($i = 0; $i < $cuentafamiliares; $i++) {
                            $html.='
						    <tr>
						      <td>';$nombrevar="relacion".$i;$html.= $$nombrevar.'</td>
						      <td>';$nombrevar="nombre".$i;$html.= $$nombrevar.'</td>
						      <td>';$nombrevar="dni".$i;$html.= $$nombrevar.'</td>
						      <td>';$nombrevar="nacimiento".$i;$html.= $$nombrevar.'</td>
						      <td>';$nombrevar="laboral".$i;$html.= $$nombrevar.'</td>
						      <td>';$nombrevar="autorizo_laboral".$i;if ( (isset($$nombrevar))&&($$nombrevar) ) $html.='<img src="img/check-square-regular.png" width="20" alt="">';
						      $html.='</td>
						    </tr>
        ';
        }
        
        $html.='
						  </tbody>
						</table>
					</div>
				</div>
';
}
else{
$html.='<br>No existen más personas en la unidad familiar<br>';
}
$html.='
				<br>
				
				
			</div>
		</div>
		<br>

		<div class="container" id="bancarios">
			<h4>Datos bancarios</h4>
		</div>

		<div class="recuadro">
			<div class="col-xs-12">
				<div class="row fila">
					
						<div class="col-xs-12">
							<p class="titulo_campo">Ingresos totales actuales de la unidad familiar</p>
							<h5>'.$ingresos.'</h5>
						</div>
						
						<div class="col-xs-12">
							<p class="titulo_campo">Número de cuenta bancaria en la que el solicitante declara ser titular, para recibir el importe que
							en su caso pudiera corresponderle como ayuda.</p>
							<h5>'.$cuenta_banco.'</h5>
						</div>
						
					
				</div>
			</div>
		</div>
		<br>

		<div class="container" id="concepto">
			<h4>Concepto de la ayuda</h4>
		</div>

		<div class="recuadro">
			<div class="col-xs-12">
				<div class="row fila">
					
					<div class="col-xs-12">
						<p class="titulo_campo">La necesidad que se pretende cubrir con la solicitud de esta ayuda es...</p>
						<h4><i class="far fa-check-square"></i> Necesidades básicas de subsistencia.</h4>
					</div>

				</div>
			</div>
		</div>
		<br>

		

		<div class="container" id="">
			<div class="col-xs-12">
				<div class="row fila">
					<div class="col-xs-1">
						<h4><i class="far fa-check-square"></i></h4>
					</div>
					<div class="col-xs-11 text-justify">
						<h5><img src="img/check-square-regular.png" width="20" alt="">&nbsp;<b>DECLARO BAJO MI RESPONSABILIDAD que son ciertos los datos</b> consignados en la presente solicitud y en los documentos que aporto y que conozco mi obligación de comunicar al Ayuntamiento de León, cualquier variación que pudiera producirse en mis circunstancias personales: domicilio, no miembros unidad familiar, etc.
						</h5>
					</div>
				</div>
			</div>
		</div>
		<br>

		<div class="container" id="">
			<div class="col-xs-12">
				<div class="row fila">
					<div class="col-xs-1">
						<h4><i class="far fa-check-square"></i></h4>
					</div>
					<div class="col-xs-11 text-justify">
						<h5><img src="img/check-square-regular.png" width="20" alt="">&nbsp;<b>ME COMPROMETO a justificar la Ayuda de Urgencia Social</b>, en el caso de que me sea concedida, en el plazo máximo de tres meses a contar desde la finalización del actual Estado de Alarma decretado por el COVID-19.
						</h5>
					</div>
				</div>
			</div>
		</div>
		<br>

		<div class="container" id="">
			<div class="col-xs-12">
				<div class="row fila">
					<div class="col-xs-1">
						<h4><i class="far fa-check-square"></i></h4>
					</div>
					<div class="col-xs-11 text-justify">
						<h5><img src="img/check-square-regular.png" width="20" alt="">&nbsp;<b>HE LEÍDO</b> la cláusula de protección de datos 
                         y <b>AUTORIZO </b>a consultar mis datos.
						</h5>
						<p>
							De conformidad con lo dispuesto en el artículo 28 de la Ley 39/2015, de 1 de octubre, de Procedimiento Administrativo Común de las administraciones Publicas y en las letras c) y d) del artículo 6.1 y 9.2 h) del Reglamento (UE) 2016/679, de 27 de abril, de Protección de Datos de Carácter Personal, se informa que la presentación de esta solicitud posibilita el tratamiento de  los datos de carácter personal contenidos en el impreso y obtenidos en la tramitación del procedimiento. En consecuencia, su solicitud habilita para que el Ayuntamiento de León obtenga directamente, de forma telemática o a través de otros medios, los datos necesarios para prestar, en el ejercicio de las competencias de este organismo, la atención social demandada, y entre otros los siguientes: datos de identidad, de salud, de residencia en el servicio de verificación de datos de residencia, datos facilitados por el Registro Civil y datos económicos y patrimoniales necesarios para la determinación de la capacidad económica procedentes de la Agencia Tributaria, Entidades gestoras de los distintos regímenes de Seguridad Social, Dirección General del Catastro y otros organismos públicos. Asimismo, se le informa que los datos de carácter personal aportados a este formulario, así como a la documentación adjunta al mismo, serán incorporados a un fichero de titularidad del Ayuntamiento de León a efectos de ser utilizados exclusivamente para la gestión del correspondiente recurso que se solicita, pudiendo ejercer, en cualquier momento, su derecho de acceso, rectificación, cancelación y oposición por medio de escrito dirigido al Ayuntamiento de León, Avda., Ordoño II, no 10 de León. Se le informa que los datos contenidos en esta solicitud serán incorporados al fichero automatizado “Usuarios de los Servicios Sociales de Castilla y León”, de titularidad de la Gerencia de Servicios Sociales, pudiendo igualmente ejercer los derechos de acceso, rectificación, cancelación y oposición ante la misma.
						</p>
					</div>
				</div>
			</div>
		</div>
		<br>

<pagebreak />
		
		<div class="container" id="">
			<div class="col-xs-12">
				<div class="row fila">
					<div class="col-xs-1">
						<h4><i class="far fa-check-square"></i></h4>
					</div>
					<div class="col-xs-11 text-justify">
						<h5><img src="img/check-square-regular.png" width="20" alt="">&nbsp;<b>DECLARO </b>que he sido informado suficientemente sobre el tratamiento de los datos personales que resulten necesarios a tal fin, aportados en el presente formulario y, en su caso, en mi historia social para tramitar la presente solicitud. 
						</h5>
					</div>
				</div>
			</div>
		</div>
		<br>

		<div class="container" id="">
			<div class="col-xs-12">
				<div class="row fila">
					<div class="col-xs-1">
						<h4><i class="far fa-check-square"></i></h4>
					</div>
					<div class="col-xs-11 text-justify">
						<h5><img src="img/check-square-regular.png" width="20" alt="">&nbsp;La persona firmante declara no encontrarse incurso en ninguno de los supuestos de incapacidad, incompatibilidad o prohibición para la percepción de ayudas o subvenciones públicas reguladas en la Ley 38/2003, de 17 de noviembre, General de Subvenciones.
						</h5>
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
            $mail->Password = 'leon-20-EDUSI';
            $mail->setFrom('info@puertasdigitales.es');
            $mail->addAddress('info@puertasdigitales.es');
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
			
            //echo $mpdf->Output('formulario.pdf', "S");
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
