document.getElementById("Enviar_login").addEventListener("click", enviar);

let nombreLogin = false;
let contraseñaLogin = false;

function enviar(e){
    
    //detengo el envio para las comprobaciones
    e.preventDefault();

    let nombre = document.getElementById("Usuario_login").value;
    let contraseña = document.getElementById("Contraseña_login").value;

    //llamo a las funciones
    validarNombre(nombre);
    validarContraseña(contraseña);
    
    //si todo esta correcto se envia el formulario para su validacion en php
    if(nombreLogin == true && contraseñaLogin == true){
        document.getElementsByTagName("form")[0].submit();
    }
    
}

//funciones con validacion de espresiones regulares, si esta bien el borde se pone verde y si esta mal se pone rojo
function validarNombre(x){

    let exp_nombre = /[A-Za-z]{2}|[0-9]{2}|[A-Za-z][0-9]/;

    if(exp_nombre.test(x)){
        document.getElementById("Usuario_login").style.borderBottom = "1px solid green";
        nombreLogin = true;
    }
    else{
        document.getElementById("Usuario_login").style.borderBottom = "1px solid red";
        nombreLogin = false;
    }
    
}

function validarContraseña(x){
    
    let exp_contraseña = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

    if(exp_contraseña.test(x)){
        document.getElementById("Contraseña_login").style.borderBottom = "1px solid green";
        contraseñaLogin = true;
    }
    else{
        document.getElementById("Contraseña_login").style.borderBottom = "1px solid red";
        contraseñaLogin = false;
    }
    
}