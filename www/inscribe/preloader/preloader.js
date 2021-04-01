
    setTimeout( ()=>{

        var tmrReady = setInterval(isPageFullyLoaded, 100);

        const quita_preloader = ()=> {
            document.getElementById("caja_loader").classList.toggle("caja_loader_2");
            document.getElementById("container_principal").classList.remove("oculto");
            setTimeout(()=> document.getElementById("caja_loader").classList.add("quitar_capa_loader"),2000);
            window.scrollTo(0,0);
            clearInterval(tmrReady);
        }

        function isPageFullyLoaded (){
            if (document.readyState == "loaded" || document.readyState == "interactive" || document.readyState == "complete" ) {quita_preloader();}
        }
    }, 2500)

