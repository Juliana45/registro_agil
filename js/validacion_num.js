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