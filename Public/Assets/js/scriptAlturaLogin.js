asignarAltura();
var hVentana;

function asignarAltura(){
    var valorAltura = getAlturaVentana();
    console.log("Esta es la altura: " + valorAltura);
    var contElemento = document.getElementById('cont_login');
    contElemento.style.height = (valorAltura - 60) + 'px';
}

function getAlturaVentana(){
    var hVentana = window.innerHeight;    
    return hVentana;
}