document.getElementById("enviarJuego").addEventListener("click", enviar);

let nombreJuego = false;
let descripcionJuego = false;
let precioJuego = false;

function enviar(e) {
    //detengo el envio del formulario para comprobar los campos
    e.preventDefault();

    let nombre = document.getElementById("nombreJuego").value;
    let descripcion = document.getElementById("descripcionJuego").value;
    let precio = document.getElementById("precioJuego").value;
    
    //aqui llamo a las funciones
    validarNombre(nombre);
    validarDescripcion(descripcion);
    validarPrecio(precio);

    if(nombreJuego == true &&
        descripcionJuego == true &&
        precioJuego == true){
        document.getElementsByTagName("form")[0].submit(); 
    }
}

function validarNombre(nombre){
    let contadorNombre = 0;
    if(nombre!= ''){
        for (var i = 0; i < nombre.length; i++) {
            contadorNombre++;
        }
        if(contadorNombre< 40){
            nombreJuego = true;
        }
        else{
            nombreJuego = false;
        }
    }
    else{
        nombreJuego = false;
    }
}

function validarDescripcion(descripcion){
    let contadorDescripcion = 0;
    if(descripcion!= ''){
        for (var i = 0; i < descripcion.length; i++) {
            contadorDescripcion++;
        }
        if(contadorDescripcion< 250){
            descripcionJuego = true;
        }
        else{
            descripcionJuego = false;
        }
    }
    else{
        descripcionJuego = false;
    }
}

function validarPrecio(precio){
    if(precio!= ''){
        if(!isNaN(precio)){
            precioJuego = true;
        }
        else{
            precioJuego = false;
        }
    }
    else{
        precioJuego = false;
    }
}