$(document).find('.child-modal').on('hidden.bs.modal', function () {
    console.log('hiding child modal');
    $('body').addClass('modal-open');
});

$(window).scroll(function () {
            sessionStorage.scrollTop = $(this).scrollTop();
        });
        $(document).ready(function () { 
               //$('#portfolioModalbus').modal('toggle');  lineas 72 a 77
            if (sessionStorage.scrollTop != "undefined") {
                $(window).scrollTop(sessionStorage.scrollTop);                
            }
        });

//Lineas de aqui a 51 es el intento con AJAX. no consigo que se transfieran los datos. por tanto las variables eben estar mal.
//una vez esto este arreglado deberia funcionar.
//$(document.ready(function(){
//
//
//     $('#submit-button').submit(function(event) {
//    // get the form data
//
//        var buscar = $('input[name=palabra]').val();
//
//
//    // process the form
//        $.ajax({
//        type        : 'POST',
//        url         : /index.php,
//        data: {'buscar': $("#buscar").val(),},
//        dataType    : 'json',
//        success: function(e){
//
//        //   var palabra = JSON.parse(result);
//        //   console.log("palabra: "+palabra);
//        //   e.location.reload(false);
//          $('#portfolioModalbus').modal('toggle');
//  }
//
//    })
//
//    event.preventDefault();
//
//  // e.location.reload(false);
//  //  $('#banner-expanded').hide();
//  //  $('#container1').hide();
//  //  $('#thankyou').show();
//
//}
//});




//if(typeof($buscar) === 'string') {
//    $('#portfolioModalbus').modal('toggle');
//}
  
// $_POST['palabra'] = null;

//var $buscar = 10;
//var $scheck = $buscar;

//if($scheck != $buscar) {
//    $('#portfolioModalbus').modal('toggle');
//}

//$buscar = 10;
//$_POST['buscador'] = 10;


//if(typeof($buscar) = 10) {
//    $('#portfolioModalbus').modal('hide');
//}
//if(typeof($_POST['buscador']) = 10) {
//    $('#portfolioModalbus').modal('hide');
//}




//if ($_POST['buscador']){
    
//    $buscar = $_POST['palabra'];
//    }else{$_POST['palabra'] = null;}

//if(typeof($buscar) = null){} else {
//    $('#portfolioModalbus').modal('toggle');
//}

//function getdata(){
//   var bus = document.getElementById('Randall').value;
//   $('#portfolioModalbus').modal('toggle');
//}

//if(typeof($buscar) != "undefined" && $buscar !== null) {
//    $('#portfolioModalbus').modal('toggle');
//}


   //$("#submit-button").submit(function(e){
   //  e.location.reload(false);
   // $('#portfolioModalbus').modal('show');
   //});

  // let $buscar;
  //     if (typeof ($buscar) !== 'undefined'){
  //     $('#portfolioModalbus').modal('toggle');
  //     }