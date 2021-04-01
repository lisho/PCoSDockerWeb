<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Firma</title>
  <link rel="stylesheet" href="firma.css">
  
</head>
<body onselectstart="return false">

    <div class="card border-secondary ">
                    
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-10"><h5><i class="fas fa-signature"></i>     Firma (*)</h5></div>
<!--                             <div data-toggle="modal" data-target="#info_firmar" class="col-2 text-right"><i type="button" id="info_firmar_btn" class="fas fa-question-circle btn btn-info boton_help animated flash"></i></div>
 -->                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body text-secondary" >    
            <div class="input-group">
                <div class="container">
                    <div class="row wrapper">
                        <p>Firma dentro del recuadro con el puntero del ratón o con el dedo si estás utilizando un dispositivo táctil</p>
                        <input type="text" style='display: none;' id="firma" name="firma">
                        <div class="col-12" id="contenedor_firma">
                            <canvas id="signature-pad" class="signature-pad"></canvas>
                        </div>
                    </div>
                </div>
                
            </div>
            <br>
            <div class="input-group">
                <div class="container text-center">
                    <div class="btn btn-danger" id="clear">Borrar firma</div>
                </div>
                
            </div>
        </div>
    </div>
    <br>
    
    
   
    <script src="signature_pad.js"></script>

    <script>
        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
        });
        var cancelButton = document.getElementById('clear');
        cancelButton.addEventListener('click', function (event) {
            signaturePad.clear();
        });

       
        //console.log(signaturePad)
        
    </script>
<!--
</body>
</html>
var canvas = document.getElementById('editor'),
    ctx = canvas.getContext('2d'),
    blankURL = document.getElementById('blank').toDataURL();
-->