let formulario = document.getElementById('form_crear_cuenta');
const inputs = document.querySelectorAll('#form_crear_cuenta input');

const expresiones = {
    //comentario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombreA: /^[a-zA-ZÀ-ÿ\s]{2,30}$/, // Letras y espacios, pueden llevar acentos.
    apellidosA: /^[a-zA-ZÀ-ÿ\s]{2,30}$/, // Letras y espacios, pueden llevar acentos.
    emailA: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    celularA: /^[1-9]\d{9,13}$/, // 10 a 14 numeros.
    passA: /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/ // Contraseña segura.
}

const campos = {
    nombreA: false,
    apellidosA: false,
    emailA: false,
    celularA: false,
    passA: false
}

const validarFormulario = (e) => {
    switch (e.target.name){
        case "nombreA":
            validarCampo(expresiones.nombreA, e.target, "nombreA" );
        break;
        case "apellidosA":
            validarCampo(expresiones.apellidosA, e.target, "apellidosA" );
        break;
        case "passA":
            validarCampo(expresiones.passA, e.target, "passA");
            validarPassword2();
        break;
        case "passAR":
            validarPassword2();
        break;
        case "celularA":
            validarCampo(expresiones.celularA, e.target, "celularA");
        break;
        case "emailA":
            validarCampo(expresiones.emailA, e.target, "emailA");
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

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('passA');
	const inputPassword2 = document.getElementById('passAR');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('ion-ios-close-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('ion-md-checkmark-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos['passA'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('ion-ios-close-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('ion-md-checkmark-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['passA'] = true;
	}
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', e=>{
    e.preventDefault();

	if(campos.nombreA && campos.apellidosA && campos.emailA && campos.passA && campos.celularA){
        console.log("Formulario enviado");

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
            body:datos,
        }
        // fetch('https://ritchman.com/cuenta/crearUsuario', peticion)
        fetch('http://localhost/iam/cuenta/crearUsuario', peticion)
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