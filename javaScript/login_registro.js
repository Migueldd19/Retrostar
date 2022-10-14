$(document).ready(e);

//esto es para mostrar el formulario de login o de registro segun haga click
function e(){
    
    $(".left").click(function(){
        
        $(".container1").toggleClass("active");  
        $(".container2").toggleClass("active");
    })
}