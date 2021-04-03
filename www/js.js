

$(document).ready(function () {

    console.log("leyendo js")
    var textoBusqueda; 
   /*  var data ={'lang' : '', 'palabra' : idioma}; */
  
  
    $("#palabra").change(function (e) { 
        e.preventDefault();
        textoBusqueda = $("#palabra").val();
        data.palabra = textoBusqueda;

    });          
   
    $("#formularioBuscar").on('submit', function(e){ 
    
        e.preventDefault();
        
        console.log(data);
        $.ajax({
            type: "POST",
            url: "traedatos.php",
            data: data,
            
            success: function (response) {
              
                $("#datosBusqueda").html(response);
            }
            
        }).then(
            $.ajax({
                type: "POST",
                url: "traesubmodales.php",
                data: data,
                
                success: function (response) {
                   
                    $("#datosSegundaBusqueda").html(response);
                }
            })
        );


        // rerseteamos el campo de texto y su valor en el data
        data.palabra ="";
        $("#palabra").val("");
    });


});
