asignarAltura();
var hVentana;

function asignarAltura(){
    var valorAltura = getAlturaVentana();
    console.log("Esta es la altura: " + valorAltura);

    //PANEL FIJO
    var aside_menu_fijo = document.getElementById('menu_aside');
    aside_menu_fijo.style.height = valorAltura + 'px';

    var aside_principal = document.getElementById('cont_aside');
    aside_principal.style.height = valorAltura + 'px';
}

function getAlturaVentana(){
    var hVentana = window.innerHeight;    
    return hVentana;
}
