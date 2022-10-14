
document.getElementById("Enviar_registro").addEventListener("click", enviar);

let nombreRegistro = false;
let contraseñaRegistro = false;
let contraseña2Registro = false;
let emailRegistro = false;
let telefonoRegistro = false;

function enviar(e){
    
    //detengo el envio del formulario para comprobar los campos
    e.preventDefault();

    let nombre = document.getElementById("Nombre_registro").value;
    let contraseña = document.getElementById("Contraseña_registro").value;
    let contraseña2 = document.getElementById("Contraseña2_registro").value;
    let email = document.getElementById("email_registro").value;
    let telefono = document.getElementById("Telefono").value;
    
    //aqui llamo a las funciones 
    validarNombreRegistro(nombre);
    validarContraseñaRegistro(contraseña);
    validarContraseña2Registro(contraseña, contraseña2);
    validarEmail(email);
    validarTelefono(telefono)
    
    //si todo esta correcto se envia el formulario para su validacion en php
    if(nombreRegistro == true && contraseñaRegistro == true && contraseña2Registro == true && emailRegistro == true && telefonoRegistro == true){
        document.getElementsByTagName("form")[1].submit();
    }
    
}

//en las funciones se comprueba todo con espresiones regulares, si esta correcto el borde pasa a verde y sino pasa a rojo
function validarNombreRegistro(x){

    let exp_nombre = /[A-Za-z]{2}|[0-9]{2}|[A-Za-z][0-9]/;

    if(exp_nombre.test(x)){
        document.getElementById("Nombre_registro").style.borderBottom = "1px solid green";
        nombreRegistro = true;
    }
    else{
        document.getElementById("Nombre_registro").style.borderBottom = "1px solid red";
        nombreRegistro = false;
    }
    
}

function validarContraseñaRegistro(x){
    
    let exp_contraseña = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

    if(exp_contraseña.test(x)){
        document.getElementById("Contraseña_registro").style.borderBottom = "1px solid green";
        let contraseñaRegistro = true;
    }
    else{
        document.getElementById("Contraseña_registro").style.borderBottom = "1px solid red";
        let contraseñaRegistro = false;
    }
    
}

function validarContraseña2Registro(x, y){

    let exp_contraseña2 = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

    if(exp_contraseña2.test(x)){
        if(x == y){
            document.getElementById("Contraseña2_registro").style.borderBottom = "1px solid green";
            let contraseña2Registro = true;
        }
        else{
            document.getElementById("Contraseña2_registro").style.borderBottom = "1px solid red";
            let contraseñaRegistro = false;
        }
    }
    else{
        
        document.getElementById("Contraseña2_registro").style.borderBottom = "1px solid red";
        let contraseñaRegistro = false;
    }
    
}

function validarEmail(x){

    let exp_email = /^[\w]+@{1}[\w]+\.+[a-z]{2,3}$/;

    if(exp_email.test(x)){
        document.getElementById("email_registro").style.borderBottom = "1px solid green";
        let emailRegistro = true;
    }
    else{
        document.getElementById("email_registro").style.borderBottom = "1px solid red";
        let emailRegistro = false;
    }
}

function validarTelefono(x){

    let exp_telefono = /^[9|6]{1}([\d]{2}[-]*){3}[\d]{2}$/;

    if(exp_telefono.test(x)){
        document.getElementById("Telefono").style.borderBottom = "1px solid green";
        telefonoRegistro = true;
    }
    else{
        document.getElementById("Telefono").style.borderBottom = "1px solid red";
        telefonoRegistro = false;
    }

}