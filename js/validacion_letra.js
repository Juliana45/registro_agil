function Letras(evento){
		key= evento.keyCode || evento.wich;
		teclado= String.fromCharCode(key).toLowerCase();
		Letra = " abcdefghijklmnopqrstuvwxyz";
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