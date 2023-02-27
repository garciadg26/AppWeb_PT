


function confirmEliminar(){
    var respuesta = confirm("¿Estas seguro que deseas ELIMINAR la información?")
    if(respuesta == true){
        return true;
    }else{
        return false;
    }
}
function confirmActualizar(){
    var respuesta = confirm("¿Estas seguro que deseas ACTUALIZAR la información?")
    if(respuesta == true){
        return true;
    }else{
        return false;
    }
}