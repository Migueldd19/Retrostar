document.getElementById("enviar").addEventListener("click", enviar);

let nombreUsuario = false;
let contraseñaUsuario = false;
let emailUsuario = false;
let telefonoUsuario = false;

function enviar(e){
    
    //detengo el envio del formulario para comprobar los campos
    e.preventDefault();

    let nombre = document.getElementById("nombreUsuario").value;
    let contraseña = document.getElementById("contraseñaUsuario").value;
    let email = document.getElementById("emailUsuario").value;
    let telefono = document.getElementById("tlfUsuario").value;
    
    //aqui llamo a las funciones 
    validarNombre(nombre);
    validarContraseña(contraseña);
    validarEmail(email);
    validarTelefono(telefono)
    
    //si todo esta correcto se envia el formulario para su validacion en php
    if(nombreUsuario == true && contraseñaUsuario == true && emailUsuario == true && telefonoUsuario == true){
        alert("entra")
        //document.getElementsByTagName("form")[1].submit();
    }
    
}

//en las funciones se comprueba todo con espresiones regulares, si esta correcto el borde pasa a verde y sino pasa a rojo
function validarNombreRegistro(x){

    let exp_nombre = /[A-Za-z]{2}|[0-9]{2}|[A-Za-z][0-9]/;

    if(exp_nombre.test(x)){
        document.getElementById("nombreUsuario").style.borderBottom = "1px solid green";
        nombreRegistro = true;
        alert("hola1")
    }
    else{
        document.getElementById("nombreUsuario").style.borderBottom = "1px solid red";
        nombreRegistro = false;
        alert("hola2")
    }
    
}

function validarContraseñaRegistro(x){
    
    let exp_contraseña = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

    if(exp_contraseña.test(x)){
        document.getElementById("labelContraseñaUsuario").style.borderBottom = "1px solid green";
        let contraseñaRegistro = true;
    }
    else{
        document.getElementById("labelContraseñaUsuario").style.borderBottom = "1px solid red";
        let contraseñaRegistro = false;
    }
    
}

function validarEmail(x){

    let exp_email = /^[\w]+@{1}[\w]+\.+[a-z]{2,3}$/;

    if(exp_email.test(x)){
        document.getElementById("emailUsuario").style.borderBottom = "1px solid green";
        let emailRegistro = true;
    }
    else{
        document.getElementById("emailUsuario").style.borderBottom = "1px solid red";
        let emailRegistro = false;
    }
}

function validarTelefono(x){

    let exp_telefono = /^[9|6]{1}([\d]{2}[-]*){3}[\d]{2}$/;

    if(exp_telefono.test(x)){
        document.getElementById("tlfUsuario").style.borderBottom = "1px solid green";
        telefonoRegistro = true;
    }
    else{
        document.getElementById("tlfUsuario").style.borderBottom = "1px solid red";
        telefonoRegistro = false;
    }

}