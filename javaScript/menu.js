$(document).ready(e);
  
function e(){

    /* hacer click en logo se añade clase active al menu*/
    $(".logo_contenido").click(function(){
        
        $(".menu").toggleClass("active");
        $(".contenido_perfil").removeClass("active");
        
    })

    
    /* click en sesion*/
    $("#log_out").click(function(){
        $(".contenido_perfil").toggleClass("active");
    })
       
    let pagina = obtenerCookie("Pagina");
    if(pagina == null || pagina == "" || pagina == undefined){
        $(".contenedor2").load("php/Juegos.php");
    }
    else{
        $(".contenedor2").load("php/"+pagina);
    }
    
    $(".nombres").click(function(){
        if(screen.width<="700"){
            $(".menu").toggleClass("active");
        }
        
    })

    /*cargas de todas las paginas a la principal*/

    $("#home").click(function(){
        document.cookie = 'Pagina=Juegos.php; Path=/;';
        $(".contenedor2").load("php/Juegos.php");
    })

    $("#biblioteca").click(function(){
        document.cookie = 'Pagina=Biblioteca.php; Path=/;';
        $(".contenedor2").load("php/Biblioteca.php")
    })

    $("#deseos").click(function(){
        document.cookie = 'Pagina=ListaDeseos.php; Path=/;';
        $(".contenedor2").load("php/ListaDeseos.php")
    })

    $("#usuarios").click(function(){
        document.cookie = 'Pagina=Usuarios.php; Path=/;';
        $(".contenedor2").load("php/Usuarios.php")
    })

    $("#administrar").click(function(){
        document.cookie = 'Pagina=administrar.php; Path=/;';
        $(".contenedor2").load("php/administrar.php")
    })
    
    $("#btn_sesion1").click(function(){
        $(".contenedor2").load("php/login_registro.php")
    })

    $("#btn_sesion2").click(function(){
        $(".contenedor2").load("php/cierreSesion.php");
        document.cookie = 'Pagina=Juegos.php; Path=/;';
    })


    //recorro las cookies para encontrar la que me da el nombre de la pagina
    
    function obtenerCookie(e){
        let listaCookies = document.cookie.split(';');
        for (i in listaCookies) {
            let busca = listaCookies[i].search("Pagina");
            if (busca == 1) {
                let prueba = listaCookies[i].split("=");
                let resultado = prueba["1"];
                return resultado;
            }
        }
    } 
}

