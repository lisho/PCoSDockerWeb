

$(document).ready(function () {

    console.log("leyendo js")
    
    var textoBusqueda; 
    var data ={'lang' : '', 'palabra' : ''};
  
    $("#palabra").change(function (e) { 
        e.preventDefault();
        textoBusqueda = $("#palabra").val();
        data.palabra = textoBusqueda;

    });

    data.lang = idioma;
            
   
    $("#buscar").click(function (e) { 
        e.preventDefault();
        
        console.log(data);
        $.ajax({
            type: "POST",
            url: "traedatos.php",
            data: data,
            
            success: function (response) {
                console.log(response)
                $("#datosBusqueda").html(response);
            }
        });


        // rerseteamos el campo de texto
        data.palabra ="";
        $("#palabra").val("");
    });


});
