let formulario = document.getElementById('form_actualizar_curso');
const inputs = document.querySelectorAll('#form_actualizar_curso input');

const expresiones = {
    nombreCursoINP: /^[\w\s\u00C0-\u024F]{2,100}$/, // Letras y espacios, pueden llevar acentos.
    costoCursoINP: /^[1-9]\d{1,8}$/, // 10 a 14 numeros.
    duracionCursoINP: /^[1-9]\d{0,8}$/ // 10 a 14 numeros.
}

const campos = {
    nombreCursoINP: false,
    costoCursoINP: false,
    duracionCursoINP: false
}

const validarFormulario = (e) => {
    switch (e.target.name){
        case "nombreCursoINP":
            validarCampo(expresiones.nombreCursoINP, e.target, "nombreCursoINP");
        break;
        case "costoCursoINP":
            validarCampo(expresiones.costoCursoINP, e.target, "costoCursoINP");
        break;
        case "duracionCursoINP":
            validarCampo(expresiones.duracionCursoINP, e.target, "duracionCursoINP");
        break;
    }
}

const validarCampo = (expresiones, input, campo) => {
    if(expresiones.test(input.value)){
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('ion-md-checkmark-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('ion-ios-close-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('ion-ios-close-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('ion-md-checkmark-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
    }
}


inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', e=>{
    e.preventDefault();

    let nombreCursoAct = document.getElementById('nombreCursoINP');
    let costoCursoAct = document.getElementById('costoCursoINP');
    let duracionCursoAct = document.getElementById('duracionCursoINP');
    let categoriaCurso = document.getElementById('catCursoINP');
    let tipoCurso = document.getElementById('tipoCursoINP');
    let softwareCurso = document.getElementById('softCursoINP');

    // if(campos.nombreCurso && campos.costoCurso && campos.duracionCurso && categoriaCurso.value > 0 && tipoCurso.value > 0 && softwareCurso.value > 0){
    if(nombreCursoAct != '' && costoCursoAct != ''  && duracionCursoAct != '' && categoriaCurso.value > 0 && tipoCurso.value > 0 && softwareCurso.value > 0){
        console.log('Formulario validado con exito');
        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 3000);

        // QUITAMOS LOS ICONOS DE LA VISTA DEL USUARIO
		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});

        //ENVIAMOS LOS DATOS A PHP
        let datos = new FormData(formulario);
        //creamos un objeto
        let peticion = {
            method:'POST',
            body:datos,
        }
        fetch('https://ritchman.com/consulta/actualizarCurso', peticion)
        // fetch('http://localhost/iam/consulta/actualizarCurso', peticion)
        .then(respuesta => respuesta.json())
        .then(respuesta =>{
    
            for(const resultado in respuesta){
                let padre = document.querySelector('#'+resultado);
                padre.classList.add('resaltar');
                let txt = document.createElement('p');
                txt.classList.add('text-danger');
                txt.classList.add('remover');
                txt.innerHTML = respuesta[resultado];
                document.querySelector('#'+resultado).insertAdjacentElement('afterend', txt);
            }
    
        }).catch(error => console.log('Error', error));
        //FIN DATOS PHP
        
        setTimeout(() => {
            document.location.reload();
        }, 3000);
        // formulario.reset();
        // return true;
        
    } else {
        console.log("Formulario rechazado");
        console.log("Nombre: " + nombreCursoAct);
        console.log("Costo: " + costoCursoAct);
        console.log("Duracion: " + duracionCursoAct);
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
        }, 3000);
    }
});