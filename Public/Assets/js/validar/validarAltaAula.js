let formulario = document.getElementById('form_alta_aulas');
const inputs = document.querySelectorAll('#form_alta_aulas input');

const expresiones = {
    nomAulaINP: /^[\w\s\u00C0-\u024F]{2,60}$/, // Letras y espacios, pueden llevar acentos.
    maxAulaINP: /^[1-9]\d{0,1}$/, // 10 a 14 numeros.
    //durCursoINP: /^[1-9]\d{0,8}$/ // 10 a 14 numeros.
}

const campos = {
    nomAulaINP: false,
    maxAulaINP: false
}

const validarFormulario = (e) => {
    switch (e.target.name){
        case "nomAulaINP":
            validarCampo(expresiones.nomAulaINP, e.target, "nomAulaINP");
        break;
        case "maxAulaINP":
            validarCampo(expresiones.maxAulaINP, e.target, "maxAulaINP");
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

    // if(campos.nombreCurso && campos.costoCurso && campos.duracionCurso && categoriaCurso.value > 0 && tipoCurso.value > 0 && softwareCurso.value > 0){
    if(campos.nomAulaINP && campos.maxAulaINP){
        console.log('Formulario validado con exito');

        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
        }, 5000);

        // QUITAMOS LOS ICONOS DE LA VISTA DEL USUARIO
        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });

        //ENVIAMOS LOS DATOS A PHP
        let datos = new FormData(formulario);
        //creamos un objeto
        let peticion = {
            method:'POST',
            body: datos,
        }
        // fetch('https://ritchman.com/altaAula/crearAula', peticion)
        fetch('http://localhost/iam/altaAula/crearAula', peticion)
        .then(respuesta => respuesta.json())
        .then(json => console.log(json))
        .catch(function (error){
            console.log('Error: ', error);
        });

        //FIN DATOS PHP
        formulario.reset();
        // return true;
        

    } else {
        console.log("Formulario rechazado");
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
        }, 5000);
    }
});