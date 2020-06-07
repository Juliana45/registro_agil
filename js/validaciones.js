/**
 * verifica que los datos ingresados solo sean letras o numeros o numeros y letras
 * 
 * @param {*} evento 
 * 
 * @var string key 		almacena la entrada del teclado
 * @var string teclado 		almacena lo que hay en la entrada del teclado
 * @var string letra 		almacena los caracteres permitidos
 * @var string especiales 		array almacena los caracteres especiales
 * @var boolean teclado_especial 	
 */

function Letras(evento){
	key= evento.keyCode || evento.wich;
	teclado= String.fromCharCode(key).toLowerCase();
	Letra = " abcdefghijklmnopqrstuvwxyz";
	especiales= "8-37-38-46";
	teclado_especial= false;

	/**
	 * recorre lo que hay en el array especiales 
	 */
	for (var i  in especiales) {
		/**
		 * si lo que se esta capturando es igual a lo que esta en especiales
		 */
		if (key == especiales[i]) {
			teclado_especial=true;break;
		}
	}

	/**
	 * si la tecla capturada se encuentra en letra y es diferente a teclado especial
	*/ 
	if (Letra.indexOf(teclado) == -1 && !teclado_especial) {
		return false;
	}
}

function numeros(evento){
	key= evento.keyCode || evento.wich;
	teclado= String.fromCharCode(key);
	numero = " 0123456789";
	especiales= "8-37-38-46";
	teclado_especial= false;

	for (var i  in especiales) {
		if (key == especiales[i]) {
			teclado_especial=true;break;
		}
	}

	if (numero.indexOf(teclado) == -1 && !teclado_especial) {
		return false;
	}
}

function Letrasynumeros(evento){
    key= evento.keyCode || evento.wich;
    teclado= String.fromCharCode(key);
    Letra = " abcdefghijklmnopqrstuvwxyz0123456789";
    especiales= "8-37-38-46";
    teclado_especial= false;

    for (var i  in especiales) {
        if (key == especiales[i]) {
			teclado_especial=true;break;
        }
    }

    if (Letra.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
    }
}