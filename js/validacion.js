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

	function validar_registro(){

    var documento,nombre1,nombre2,apellido1,apellido2,foto,clave,tipo,correo,expresion,expre,expreFoto;
    documento = document.getElementById("documento").value;
    nombre1 = document.getElementById("nombre1").value;
    nombre2 = document.getElementById("nombre2").value;
    apellido1 = document.getElementById("apellido1").value;
    apellido2 = document.getElementById("apellido2").value;
    foto = document.getElementById("btn-subir-foto").value;
    clave = document.getElementById("clave").value;
    tipo = document.getElementById("tipo_docu").value;
    correo = document.getElementById("correo").value;

    expresion = /\w+@\w+\.+[a-z]/;
    expre = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{0,30}$/;
    expreFoto = /\.(jpg|png|gif)$/;

    if(documento === "" || nombre1 === "" || apellido1 === "" || foto === "" || clave === "" || tipo === "" || correo === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(documento.length>10 || documento.length<8){
        alert("El documento no es correcto");
        return false;
    }
    else if(nombre1.length>45 || nombre1.length>45 || apellido1.length>50 || apellido2.length>50){
        alert("Los nombres y los apellidos estan muy largo");
        return false;
    }
    else if(nombre1.length<=2 || nombre1.length<=2 || apellido1.length<4 || apellido2.length<4){
        alert("Los nombres y los apellidos estan muy cortos");
        return false;
    }
    else if(clave.length>80 || clave.length<6){
        alert("la contraseña debe mas de 6 y menos de 80 caracteres");
        return false;
    }
    else if(!expresion.test(correo)){
        alert("El correo no es valido");
        return false;      
    }
    else if(!expre.test(clave)){
        alert("La contraseña debe tener al menos una minuscula, mayuscula y un número");
        return false; 
    }
    else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }
}

    
function validar_login(){

	var tipo,documento,clave;

	tipo = document.getElementById("select-login").value;
	documento = document.getElementById("documento2").value;

	if(documento === "" || tipo === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(documento.length>10 || documento.length<8){
        alert("El documento no es correcto");
        return false;
    }
}

function validar_elemento(){

	var nombre,descripcion,serial,foto,expreFoto;

	nombre = document.getElementById("input").value;
	descripcion = document.getElementById("input2").value;
	serial = document.getElementById("input3").value;
	foto = document.getElementById("foto_ele").value;

    expreFoto = /\.(jpg|png|gif)$/;

	if(nombre === "" || descripcion === "" || serial === "" || foto === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(nombre.length<4){
        alert("El nombre esta muy corto");
        return false;
    }
    else if(nombre.length>=50){
        alert("El nombre esta muy largo");
        return false;
    }
    else if(descripcion.length<4){
        alert("La descripción esta muy corto");
        return false;
    }
    else if(descripcion.length>=110){
        alert("La descripción esta muy largo");
        return false;
    }
    else if(serial.length>=20 || serial.length<6){
        alert("El numero serial no es correcto");
        return false;
    }
        else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }
}

function validar_sinserial(){

    var nombre,descripcion,serial,foto,expreFoto;

    nombre = document.getElementById("nombre").value;
    descripcion = document.getElementById("descripcion").value;
    foto = document.getElementById("foto_ele").value;
    expreFoto = /\.(jpg|png|gif)$/;

    if(nombre === "" || descripcion === "" || serial === "" || foto === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(nombre.length<4){
        alert("El nombre esta muy corto");
        return false;
    }
    else if(nombre.length>=50){
        alert("El nombre esta muy largo");
        return false;
    }
    else if(descripcion.length<4){
        alert("La descripción esta muy corto");
        return false;
    }
    else if(descripcion.length>=110){
        alert("La descripción esta muy largo");
        return false;
    }
    else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }
}

function validar_info(){

    var documento,nombre1,nombre2,apellido1,apellido2,foto,tipo,expreFoto;
    documento = document.getElementById("documento").value;
    nombre1 = document.getElementById("nombre1").value;
    nombre2 = document.getElementById("nombre2").value;
    apellido1 = document.getElementById("apellido1").value;
    apellido2 = document.getElementById("apellido2").value;
    foto = document.getElementById("btn-subir-foto").value;
    tipo = document.getElementById("tipo").value;
    expreFoto = /\.(jpg|png|gif)$/;

    if(documento === "" || nombre1 === "" || apellido1 === "" || foto === "" || tipo === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(documento.length>10 || documento.length<8){
        alert("El documento no es correcto");
        return false;
    }
    else if(nombre1.length>45 || nombre1.length>45 || apellido1.length>50 || apellido2.length>50){
        alert("Los nombres y los apellidos estan muy largo");
        return false;
    }
    else if(nombre1.length<2 || nombre1.length<2 || apellido1.length<3 || apellido2.length<3){
        alert("Los nombres y los apellidos estan muy cortos");
        return false;
    }
    else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }

}

function validar_contra(){

    var clave, clave2, expre;
    clave = document.getElementById("clave").value;
    clave2 = document.getElementById("clave2").value;

    expre = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{0,30}$/;

    if(clave === "" || clave2 === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(clave.length>80 || clave.length<6){
        alert("la contraseña debe mas de 6 y menos de 80 caracteres");
        return false;
    }
    else if(!expre.test(clave)){
        alert("La contraseña debe tener al menos una minuscula, mayuscula y un número");
        return false; 
    }

}

    function validar_visi(){

    var docu,nom1,nom2,ape1,ape2,clave,tipo,correo,expresion,expre,expreFoto;
    docu = document.getElementById("docu").value;
    nom1 = document.getElementById("nom1").value;
    nom2 = document.getElementById("nom2").value;
    ape1 = document.getElementById("ape1").value;
    ape2 = document.getElementById("ape2").value;
    clave = document.getElementById("clave_e").value;
    tipo = document.getElementById("tipo_vi").value;
    correo = document.getElementById("correo").value;

    expresion = /\w+@\w+\.+[a-z]/;
    expre = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{0,30}$/;
    expreFoto = /\.(jpg|png|gif)$/;

    if(docu === "" || nom1 === "" || ape1 === "" || clave === "" || tipo === "" || correo === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(docu.length>10 || docu.length<8){
        alert("El documento no es correcto");
        return false;
    }
    else if(nom1.length>45 || nom1.length>45 || ape1.length>50 || ape2.length>50){
        alert("Los nombres y los apellidos estan muy largo");
        return false;
    }
    else if(nom1.length<=2 || nom1.length<=2 || ape1.length<4 || ape2.length<4){
        alert("Los nombres y los apellidos estan muy cortos");
        return false;
    }
    else if(clave.length>80 || clave.length<6){
        alert("la contraseña debe mas de 6 y menos de 80 caracteres");
        return false;
    }
    else if(!expresion.test(correo)){
        alert("El correo no es valido");
        return false;      
    }
    else if(!expre.test(clave)){
        alert("La contraseña debe tener al menos una minuscula, mayuscula y un número");
        return false; 
    }
    else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }

}

function validar_buscador(){

    var documento;
    documento = document.getElementById("bus").value;

    if(documento === ""){
        alert("El campo no puede estar vacio");
        return false;
    }
    else if(documento.length>10 || documento.length<8){
        alert("El documento no es correcto");
        return false;
    }

}

function validar_visitante(){

    var documen,nombre,descripcion,serial,foto,expreFoto;

    documen = document.getElementById("documen").value;
    nombre = document.getElementById("nom").value;
    descripcion = document.getElementById("descripcion").value;
    serial = document.getElementById("numero").value;
    foto = document.getElementById("btn-subir-foto").value;
    expreFoto = /\.(jpg|png|gif)$/;

    if(documen === "" || nombre === "" || descripcion === "" || serial === "" || foto === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(documen.length>10 || documen.length<8){
        alert("El documento no es correcto");
        return false;
    }
    else if(nombre.length<4){
        alert("El nombre esta muy corto");
        return false;
    }
    else if(nombre.length>=50){
        alert("El nombre esta muy largo");
        return false;
    }
    else if(descripcion.length<4){
        alert("La descripción esta muy corto");
        return false;
    }
    else if(descripcion.length>=110){
        alert("La descripción esta muy largo");
        return false;
    }
    else if(serial.length>=20 || serial.length<6){
        alert("El numero serial no es correcto");
        return false;
    }
    else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }
}


