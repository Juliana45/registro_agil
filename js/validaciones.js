/**
 * verifica que los datos ingresados solo sean letras
 * 
 * @param evento 	evento del teclado	
 * 	
 */
function Letras(evento){
	/**
	* @var string key 		        almacena la entrada del teclado	
	* keyCode
	* wich
	*/
	key= evento.keyCode || evento.wich;
	/**
	* @var string teclado 		    almacena lo que hay en la entrada del teclado	
	*/
	teclado= String.fromCharCode(key).toLowerCase();
	/**
	* @var string letra 		    almacena los caracteres permitidos
	*/
	Letra = " abcdefghijklmnopqrstuvwxyz";
	/**
	* @var string especiales 		array almacena los caracteres especiales, como lo son:
	* 								8: backspace      37:tecla izquierda  
	* 								38: tecla derecha 46:tecla suprimir	
	*/
	especiales= "8-37-38-46";
	/**
	* @var boolean teclado_especial  se le da un valor booleano 	
	*/
	teclado_especial= false;

	/**
	 * recorre lo que hay en el array especiales 
	 */
	for (var i  in especiales) {
		/**
		 * si lo que se esta capturando en el teclado (key) es igual a 
		 * lo que esta en especiales debe de pasar la variable
		 * teclado_especial a verdadero y deja escribir la letra
		 * 
		 * break   termina la ejecución de un bucle cuando la variable 
		 * 		   cumple alguna condición.
		 */
		if (key == especiales[i]) {
			teclado_especial=true;break;
		}
	}
	/**
	 * si la tecla capturada se encuentra en letra y es diferente a 
	 * teclado_especial se retorna el valor falso, es decir no deja
	 * escribir la letra
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