


function confirmEliminar(){
    var respuesta = confirm("¿Estas seguro que deseas ELIMINAR el curso?")
    if(respuesta == true){
        return true;
    }else{
        return false;
    }
}
function confirmActualizar(){
    var respuesta = confirm("¿Estas seguro que deseas ACTUALIZAR el curso?")
    if(respuesta == true){
        return true;
    }else{
        return false;
    }
}