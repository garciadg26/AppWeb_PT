let formulario = document.getElementById('form_actualizar_user');
const inputs = document.querySelectorAll('#form_actualizar_user input');

const expresiones = {
    nombreUserINP: /^[a-zA-ZÀ-ÿ\s]{2,30}$/, // Letras y espacios, pueden llevar acentos.
    apellidosUserINP: /^[a-zA-ZÀ-ÿ\s]{2,50}$/, // Letras y espacios, pueden llevar acentos.
    emailUserINP: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    celUserINP: /^[1-9]\d{9,13}$/, // 10 a 14 numeros.
    telUserINP: /^[1-9]\d{9,13}$/, // 10 a 14 numeros.
    fechaNaUserINP: /^(19[0-9]{2}|200[0-5])-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/, // validar el formato yyyy-mm-dd desde 1900 hasta 2005
    paisUserINP: /^[a-zA-ZÀ-ÿ\s]{2,50}$/, // Letras y espacios, pueden llevar acentos.
    ciudadUserINP: /^[a-zA-ZÀ-ÿ\s]{2,50}$/, // Letras y espacios, pueden llevar acentos.
    curpUserINP: /^[A-Z0-9]{18,18}$/, // Letras y espacios, pueden llevar acentos.
    direccionUserINP: /^[a-zA-Z0-9\s]{2,80}$/, // Letras, numeros, guion y guion_bajo
    codigoPoUserINP:/^[1-9]\d{1,5}$/ // Letras, numeros, guion y guion_bajo

    //passA: /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/ // Contraseña segura.
}

const campos = {
    nombreUserINP: false,
    apellidosUserINP: false,
    emailUserINP: false,
    celUserINP: false,
    telUserINP: false,
    fechaNaUserINP: false,
    paisUserINP: false,
    ciudadUserINP: false,
    curpUserINP: false,
    direccionUserINP: false,
    codigoPoUserINP: false
}

const validarFormulario = (e) => {
    switch (e.target.name){
        case "nombreUserINP":
            validarCampo(expresiones.nombreUserINP, e.target, "nombreUserINP" );
        break;
        case "apellidosUserINP":
            validarCampo(expresiones.apellidosUserINP, e.target, "apellidosUserINP" );
        break;
        case "emailUserINP":
            validarCampo(expresiones.emailUserINP, e.target, "emailUserINP");
        break;
        case "celUserINP":
            validarCampo(expresiones.celUserINP, e.target, "celUserINP");
        break;
        case "telUserINP":
            validarCampo(expresiones.telUserINP, e.target, "telUserINP");
        break;
        case "fechaNaUserINP":
            validarCampo(expresiones.fechaNaUserINP, e.target, "fechaNaUserINP");
        break;
        case "paisUserINP":
            validarCampo(expresiones.paisUserINP, e.target, "paisUserINP");
        break;
        case "ciudadUserINP":
            validarCampo(expresiones.ciudadUserINP, e.target, "ciudadUserINP");
        break;
        case "curpUserINP":
            validarCampo(expresiones.curpUserINP, e.target, "curpUserINP");
        break;
        case "direccionUserINP":
            validarCampo(expresiones.direccionUserINP, e.target, "direccionUserINP");
        break;
        case "codigoPoUserINP":
            validarCampo(expresiones.codigoPoUserINP, e.target, "codigoPoUserINP");
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

	if(campos.nombreUserINP || campos.apellidosUserINP || campos.emailUserINP  || campos.celUserINP || campos.telUserINP || campos.fechaNaUserINP || campos.paisUserINP || campos.ciudadUserINP || campos.curpUserINP || campos.direccionUserINP || campos.codigoPoUserINP){
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
        // fetch('https://ritchman.com/usuario/actualizarUsuario', peticion)
        fetch('http://localhost/iam/usuario/actualizarUsuario', peticion)
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
        // return true;


	} else {
        console.log("Formulario rechazado");
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
        }, 5000);
	}
});