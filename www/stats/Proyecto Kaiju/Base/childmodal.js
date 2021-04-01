$(document).find('.child-modal').on('hidden.bs.modal', function () {
    console.log('hiding child modal');
    $('body').addClass('modal-open');
});

$(window).scroll(function () {
            sessionStorage.scrollTop = $(this).scrollTop();
        });
        $(document).ready(function () {
            if (sessionStorage.scrollTop != "undefined") {
                $(window).scrollTop(sessionStorage.scrollTop);                
            }
        });


//if(typeof($buscar) === 'string') {
//    $('#portfolioModalbus').modal('toggle');
//}
  
// $_POST['palabra'] = null;

//var $buscar = 10;
//var $scheck = $buscar;

//if($scheck != $buscar) {
//    $('#portfolioModalbus').modal('toggle');
//}

//if(typeof($buscar) !== null) {
//    $('#portfolioModalbus').modal('toggle');
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