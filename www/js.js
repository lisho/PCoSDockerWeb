

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
              
                $("#datosBusqueda").html(response);
            }
        }).then(
            $.ajax({
                type: "POST",
                url: "traesubmodales.php",
                data: data,
                
                success: function (response) {
                   
                    $("#portfolioModalbus").after(response);
                }
            })
        );


        // rerseteamos el campo de texto y su valor en el data
        data.palabra ="";
        $("#palabra").val("");
    });


});
