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
    $(".subcontenedor2").load("php/"+pagina);
    
    /*cargas de todas las paginas a la principal*/

    $("#home").click(function(){
        $(".subcontenedor2").load("php/Juegos.php");
    })

    $("#biblioteca").click(function(){
        $(".subcontenedor2").load("php/Biblioteca.php")
    })

    $("#deseos").click(function(){
        $(".subcontenedor2").load("php/ListaDeseos.php")
    })

    $("#amigos").click(function(){
        $(".subcontenedor2").load("php/Amigos.php")
    })

    $("#usuarios").click(function(){
        $(".subcontenedor2").load("php/Usuarios.php")
    })

    $("#administrar").click(function(){
        $(".subcontenedor2").load("php/administrar.php")
    })
    
    $("#btn_sesion1").click(function(){
        $(".subcontenedor2").load("php/login_registro.php")
    })

    $("#btn_sesion2").click(function(){
        $(".subcontenedor2").load("php/cierreSesion.php")
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

