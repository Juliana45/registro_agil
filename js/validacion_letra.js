/*Se crea la funcion "Letras"*/
function Letras(evento){
		/*Devuelve el keyCode de la tecla presionada, o el codigo del caracter */
		key= evento.keyCode || evento.wich;
		/*Este método guardado en teclado devuelve una cadena y no un objeto String,toLowerCase() devuelve el valor en minúsculas de la cadena*/
		teclado= String.fromCharCode(key).toLowerCase();
		/*Letras permitidas*/
		Letra = " abcdefghijklmnopqrstuvwxyz";
		/*Caracteres especiales permitidos*/
		especiales= "8-37-38-46";
		/*Teclado de letras especiales "false" desactivado*/
		teclado_especial= false;

		/*Se le indica en el "for" que debe recorrer uno por uno los caracteres especiales para activar los caracteres anteriormente mencionados en "especiales" */
		for (var i  in especiales) {
			if (key == especiales[i]) {

				teclado_especial=true;break;
			}
		}

		/*Si no encuentra ni letras y retorna diferente a "teclado_especial"*/
		if (Letra.indexOf(teclado) == -1 && !teclado_especial) {
			/*Retornará falso*/
			return false;
		}
	}