/**
 * verifica que los datos ingresados solo sean letras
 * 
 * @param evento 	evento del teclado	
 * 	
 */
function Letras(evento){
        /**
        * @var string key 		        almacena la entrada del teclado	
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
		teclado_especialu= false;
        /**
         * recorre lo que hay en el array especiales 
         */
		for (var i  in especiales) {
    	/**
		 * si lo que se esta capturando en el teclado (key) es igual a 
		 * lo que esta en especiales, debe cambiar el valor de la variable
		 * teclado_especial a verdadero y deja escribir los caracteres.
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
         * escribir los caracter
        */
		if (Letra.indexOf(teclado) == -1 && !teclado_especial) {
			return false;
		}
	}
/**
 * verifica que los datos ingresados solo sean numeros
 * 
 * @param evento 	evento del teclado	
 * 	
 */
	function numeros(evento){
        /**
        * @var string key 		        almacena la entrada del teclado	
        */
        key= evento.keyCode || evento.wich;
        /**
        * @var string teclado 		    almacena lo que hay en la entrada del teclado	
        */
        teclado= String.fromCharCode(key);
        /**
        * @var string numeros 		    almacena los caracteres permitidos
        */
        numero = " 0123456789";
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
		 * lo que esta en especiales, debe cambiar el valor de la variable
		 * teclado_especial a verdadero y deja escribir los caracteres.
		 * 
		 * break   termina la ejecución de un bucle cuando la variable 
		 * 		   cumple alguna condición.
		 */
			if (key == especiales[i]) {

				teclado_especial=true;break;
			}
		}
        /**
         * si la tecla capturada se encuentra en numero y es diferente a 
         * teclado_especial se retorna el valor falso, es decir, no deja
         * escribir el caracter
        */
		if (numero.indexOf(teclado) == -1 && !teclado_especial) {

			return false;
		}
	}
/**
 * verifica que los datos ingresados solo sean numeros y letras
 * 
 * @param evento 	evento del teclado	
 * 	
 */
	function Letrasynumeros(evento){
        /**
        * @var string key 		        almacena la entrada del teclado	
        */
        key= evento.keyCode || evento.wich;
        /**
        * @var string teclado 		    almacena lo que hay en la entrada del teclado	
        */
        teclado= String.fromCharCode(key);
        /**
        * @var string Letra 		    almacena los caracteres permitidos
        */
        Letra = " abcdefghijklmnopqrstuvwxyz0123456789";
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
		 * lo que esta en especiales, debe cambiar el valor de la variable
		 * teclado_especial a verdadero y deja escribir los caracteres.
		 * 
		 * break   termina la ejecución de un bucle cuando la variable 
		 * 		   cumple alguna condición.
		 */
	        if (key == especiales[i]) {

	            teclado_especial=true;break;
	        }
	    }
        /**
         * si la tecla capturada se encuentra en Letras y es diferente a 
         * teclado_especial se retorna el valor falso, es decir, no deja
         * escribir el caracter
        */
	    if (Letra.indexOf(teclado) == -1 && !teclado_especial) {

	        return false;
	    }
	}

/**
 * verifica que el formulario registro del archivo index.php
 */
	function validar_registro(){
	/**
	 * se definen las variables para capturar la informacion de los 
     * input del formulario registro en index.php
     * 
     * getElementById    permite seleccionar un elemento del formulario registro 
     *                   por medio del valor del atributo id que se haya asignado.
     * 
	 * @var String documento 
	 * @var String nombre1
	 * @var String nombre2	
	 * @var String apellido1
	 * @var String apellido2
	 * @var String tipo
	 * @var String clave
	 * @var String correo 
	 * @var String foto   
	 */
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
	/**
	 * se definen las variables que contendran una combinacion de carácteres
     * dentro de una cadena de texto (expresiones regulares).
     * 
	 * @var String expresion  Contiene el patron de carácteres que solo permite la
     *                         estructura de un correo.
     *                         // : dentro debe ir el patron de carácteres.
     *                         \w: cualquier carácter alfanumerico.
     *                         +@: busca el @.
     *                         \. : la cadena de texto debe contener un punto.
     *                         +[a-z]: cualquier carácter que este de la a hasta la z. 	  
	 */
    expresion = /\w+@\w+\.+[a-z]/;
	/**
	 * @var String expre =	  Contiene el  patron que de caracteres que se debe  
     *                        llevar la contraseña, exigiendo una 
     *                         mayúscula, minúscula y un número:
     *                         //: dentro debe ir el patron de carácteres.
     *                         ^(?=.*\d): exige numeros.
     *                         (?=.*[a-z]): exige una minúscula.
     *                         (?=.*[A-Z]): exige una mayúscula.
     *                         .{0,30}$ : debe contener minimo 6 y maximo 30 carácteres.
	 */
    expre = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}$/;
	/**
	 * @var String expreFoto =	Contiene el pratron de caracteres que debe de llevar
     *                          la imagen.
     *                         //: dentro debe ir el patron de carácteres.
     *                         \.: l archivo debe de llevar un punto.
     *                         (jpg|png|gif)$ : El archivo seleccionado solo puede
     *                                          ser .jpg, .png, .gif.
     */
    expreFoto = /\.(jpg|png|gif)$/;
    /**
     * si las variables estan vacias mostrara una alerta..
     */
    if(documento === "" || nombre1 === "" || apellido1 === "" || foto === "" || clave === "" || tipo === "" || correo === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    /**
     * si la variable documento es mayor a 10 o menor a 8 caracteres se mostrara una alerta
     */
    else if(documento.length>10 || documento.length<8){
        alert("El documento no es correcto");
        return false;
    }
    /**
     * si las variables nombre1 o nombre2 son mayor a 46 caracteres, o si las variables
     * apellido1 o apellido2 son mayor a 50 caracteres se mostrara una alerta
     */
    else if(nombre1.length>45 || nombre2.length>45 || apellido1.length>50 || apellido2.length>50){
        alert("Los nombres y los apellidos estan muy largo");
        return false;
    }
    /**
     * si las variables nombre1 o nombre2 son menores a 3 caracteres, o si las variables
     * apellido1 o apellido2 son menores a 4 caracteres se mostrara una alerta
     */
    else if(nombre1.length<=3 || nombre2.length<=3 || apellido1.length<4 || apellido2.length<4){
        alert("Los nombres y los apellidos estan muy cortos");
        return false;
    }
    /**
     * si la variable clave es mayor a 80 o menor a 6 caracteres, se mostrara una alerta.
     */
    else if(clave.length>80 || clave.length<6){
        alert("la contraseña debe mas de 6 y menos de 80 caracteres");
        return false;
    }
    /**
     * si la variable correo es diferente a la variable expresion, se mostrara una alerta.
     */
    else if(!expresion.test(correo)){
        alert("El correo no es valido");
        return false;      
    }
    /**
     * si la variable clave es diferente a la variable expre, se mostrara una alerta.
     */
    else if(!expre.test(clave)){
        alert("La contraseña debe tener al menos una minuscula, mayuscula y un número");
        return false; 
    }
    /**
     * si la variable foto es diferente a la variable expreFoto, se mostrara una alerta.
     */
    else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }
}
/**
 * verifica que el formulario login del archivo index.php
 */
function validar_login(){
	/**
	 * se definen las variables para capturar la informacion de los 
     * input del formulario login en index.php
     * 
     * getElementById    permite seleccionar un elemento del formulario registro 
     *                   por medio del valor del atributo id que se haya asignado.
     * 
	 * @var String documento 
	 * @var String tipo 
	 */
	var tipo,documento;

	tipo = document.getElementById("select-login").value;
	documento = document.getElementById("documento2").value;
   /**
     * si las variables estan vacias mostrara una alerta.
     */
	if(documento === "" || tipo === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    /**
     * si la variable documento es mayor a 10 o menor a 8 caracteres se mostrara una alerta
     */
    else if(documento.length>10 || documento.length<8){
        alert("El documento no es correcto");
        return false;
    }
}
/**
 * valida los formularios  de los archivos formulario-elemento.php,
 * formulario-elemento-vigilante.php y formulario-elmento-super.php
 */
function validar_elemento(){
	/**
	 * se definen las variables para capturar la informacion de los 
     * input de los formularios de los archivos formulario-elemento.php,
     * formulario-elemento-vigilante.php y formulario-elmento-super.php
     * 
     * getElementById    permite seleccionar un elemento del formulario registro 
     *                   por medio del valor del atributo id que se haya asignado.
     * 
	 * @var String nombre 
	 * @var String descripcion
	 * @var String serial 
	 * @var String foto
	 */
	var nombre,descripcion,serial,foto,expreFoto;

	nombre = document.getElementById("input").value;
	descripcion = document.getElementById("input2").value;
	serial = document.getElementById("input3").value;
	foto = document.getElementById("foto_ele").value;
	/**
	 * se definen las variables que contendran una combinacion de carácteres
     * dentro de una cadena de texto (expresiones regulares).
     * 
	 * @var String expreFoto =	Contiene el pratron de caracteres que debe de llevar
     *                          la imagen.
     *                         //: dentro debe ir el patron de carácteres.
     *                         \.: l archivo debe de llevar un punto.
     *                         (jpg|png|gif)$ : El archivo seleccionado solo puede
     *                                          ser .jpg, .png, .gif. 	  
	 */
    expreFoto = /\.(jpg|png|gif)$/;
   /**
     * si las variables estan vacias mostrara una alerta.
     */
	if(nombre === "" || descripcion === "" || serial === "" || foto === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    /**
     * si la variable nombre es menor a 4 caracteres, se mostrara una alerta.
     */
    else if(nombre.length<4){
        alert("El nombre esta muy corto");
        return false;
    }
    /**
     * si la variable nombre es mayor o igual a 50 caracteres, se mostrara una alerta.
     */
    else if(nombre.length>=50){
        alert("El nombre esta muy largo");
        return false;
    }
    /**
     * si la variable descripción es menor a 4 caracteres, se mostrara una alerta.
     */
    else if(descripcion.length<4){
        alert("La descripción esta muy corto");
        return false;
    }
    /**
     * si la variable descripción es mayor o igual a 110 caracteres, se mostrara una alerta.
     */
    else if(descripcion.length>=110){
        alert("La descripción esta muy largo");
        return false;
    }
    /**
     * si la variable serial es mayor o igual a 20 caracteres o menor a 6,
     * se mostrara una alerta.
     */
    else if(serial.length>=20 || serial.length<6){
        alert("El numero serial no es correcto");
        return false;
    }
    /**
     * si la variable foto es diferente a la variable expreFoto, se mostrara una alerta.
     */
        else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
return false; 
    }
}
/**
 * valida los formularios  de los archivos elemento_sin_serial.php,
 * elemento_sin_serial_vigilante.php y elemento_sin_serial_super.php
 */
function validar_sinserial(){
	/**
	 * se definen las variables para capturar la informacion de los 
     * input de los formularios de los archivos elemento_sin_serial.php,
 * elemento_sin_serial_vigilante.php y elemento_sin_serial_super.php
     * 
     * getElementById    permite seleccionar un elemento del formulario registro 
     *                   por medio del valor del atributo id que se haya asignado.
     * 
	 * @var String nombre 
	 * @var String descripcion
	 * @var String foto
	 */
    var nombre,descripcion,serial,foto,expreFoto;

    nombre = document.getElementById("nombre").value;
    descripcion = document.getElementById("descripcion").value;
    foto = document.getElementById("foto_ele").value;
	/**
	 * se definen las variables que contendran una combinacion de carácteres
     * dentro de una cadena de texto (expresiones regulares).
     * 
	 * @var String expreFoto =	Contiene el pratron de caracteres que debe de llevar
     *                          la imagen.
     *                         //: dentro debe ir el patron de carácteres.
     *                         \.: l archivo debe de llevar un punto.
     *                         (jpg|png|gif)$ : El archivo seleccionado solo puede
     *                                          ser .jpg, .png, .gif. 	  
	 */
    expreFoto = /\.(jpg|png|gif)$/;
   /**
     * si las variables estan vacias mostrara una alerta.
     */
    if(nombre === "" || descripcion === "" || serial === "" || foto === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    /**
     * si la variable nombre es menor a 4 caracteres, se mostrara una alerta.
     */
    else if(nombre.length<4){
        alert("El nombre esta muy corto");
        return false;
    }
    /**
     * si la variable nombre es mayor o igual a 50 caracteres, se mostrara una alerta.
     */
    else if(nombre.length>=50){
        alert("El nombre esta muy largo");
        return false;
    }
    /**
     * si la variable descripción es menor a 4 caracteres, se mostrara una alerta.
     */
    else if(descripcion.length<4){
        alert("La descripción esta muy corto");
        return false;
    }
    /**
     * si la variable descripción es mayor o igual a 110 caracteres, se mostrara una alerta.
     */
    else if(descripcion.length>=110){
        alert("La descripción esta muy largo");
        return false;
    }
    /**
     * si la variable foto es diferente a la variable expreFoto, se mostrara una alerta.
     */
    else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }
}
/**
 * valida los formularios  de actualizar la información personal en los 3 perfiles
 * (usuario,supervisor,vigilante).
 */
function validar_info(){
	/**
	 * se definen las variables para capturar la informacion de los 
     * input de los formularios  de actualizar la información personal en los 3 perfiles
     * (usuario,supervisor,vigilante). 
     * 
     * getElementById    permite seleccionar un elemento del formulario registro 
     *                   por medio del valor del atributo id que se haya asignado.
     * 
	 * @var String documento 
	 * @var String nombre1
	 * @var String nombre2	
	 * @var String apellido1
	 * @var String apellido2
	 * @var String tipo
	 * @var String foto   
	 */
    var documento,nombre1,nombre2,apellido1,apellido2,foto,tipo,expreFoto;
    documento = document.getElementById("documento").value;
    nombre1 = document.getElementById("nombre1").value;
    nombre2 = document.getElementById("nombre2").value;
    apellido1 = document.getElementById("apellido1").value;
    apellido2 = document.getElementById("apellido2").value;
    foto = document.getElementById("btn-subir-foto").value;
    tipo = document.getElementById("tipo").value;
	/**
	 * se definen las variables que contendran una combinacion de carácteres
     * dentro de una cadena de texto (expresiones regulares).
     * 
	 * @var String expreFoto =	Contiene el pratron de caracteres que debe de llevar
     *                          la imagen.
     *                         //: dentro debe ir el patron de carácteres.
     *                         \.: l archivo debe de llevar un punto.
     *                         (jpg|png|gif)$ : El archivo seleccionado solo puede
     *                                          ser .jpg, .png, .gif. 	  
	 */
    expreFoto = /\.(jpg|png|gif)$/;
  /**
     * si las variables estan vacias mostrara una alerta.
     */
    if(documento === "" || nombre1 === "" || apellido1 === "" || foto === "" || tipo === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    /**
     * si la variable documento es mayor a 10 o menor a 8 caracteres se mostrara una alerta
     */
    else if(documento.length>10 || documento.length<8){
        alert("El documento no es correcto");
        return false;
    }
    /**
     * si las variables nombre1 o nombre2 son mayor a 46 caracteres, o si las variables
     * apellido1 o apellido2 son mayor a 50 caracteres se mostrara una alerta
     */
    else if(nombre1.length>45 || nombre1.length>45 || apellido1.length>50 || apellido2.length>50){
        alert("Los nombres y los apellidos estan muy largo");
        return false;
    }
    /**
     * si las variables nombre1 o nombre2 son menores a 3 caracteres, o si las variables
     * apellido1 o apellido2 son menores a 4 caracteres se mostrara una alerta
     */
    else if(nombre1.length<2 || nombre1.length<2 || apellido1.length<3 || apellido2.length<3){
        alert("Los nombres y los apellidos estan muy cortos");
        return false;
    }
    /**
     * si la variable foto es diferente a la variable expreFoto, se mostrara una alerta.
     */
    else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }
}
/**
 * valida los formularios  de actualizar la clave en los 3 perfiles (usuario,
 * supervisor,vigilante).
 */
function validar_contra(){
	/**
	 * se definen las variables para capturar la informacion de los 
     * input de los formularios  de actualizar la clave en los 3 perfiles
     * (usuario,supervisor,vigilante). 
     * 
     * getElementById    permite seleccionar un elemento del formulario registro 
     *                   por medio del valor del atributo id que se haya asignado.
     * 
	 * @var String clave2
	 * @var String clave  
	 */
    var clave, clave2, expre;
    clave = document.getElementById("clave").value;
    clave2 = document.getElementById("clave2").value;
	/**
	 * se definen las variables que contendran una combinacion de carácteres
     * dentro de una cadena de texto (expresiones regulares).
     * 
     * @var String expre =	  Contiene el  patron que de caracteres que se debe  
     *                        llevar la contraseña, exigiendo una 
     *                         mayúscula, minúscula y un número:
     *                         //: dentro debe ir el patron de carácteres.
     *                         ^(?=.*\d): exige numeros.
     *                         (?=.*[a-z]): exige una minúscula.
     *                         (?=.*[A-Z]): exige una mayúscula.
     *                         .{0,30}$ : debe contener minimo 6 y maximo 30 carácteres.	  
	 */
    expre = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{0,30}$/;
    /**
     * si las variables estan vacias mostrara una alerta.
     */
    if(clave === "" || clave2 === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    /**
     * si la variable clave es mayor a 80 o menor a 6 caracteres, se mostrara una alerta.
     */
    else if(clave.length>80 || clave.length<6){
        alert("la contraseña debe mas de 6 y menos de 80 caracteres");
        return false;
    }
    /**
     * si la variable clave es diferente a la variable expre, se mostrara una alerta.
     */
    else if(!expre.test(clave)){
        alert("La contraseña debe tener al menos una minuscula, mayuscula y un número");
        return false; 
    }
}
/**
 * verifica que el formulario registro del vigilante del archivo listar_vigilantes.php
 */
    function validar_visi(){
	/**
	 * se definen las variables para capturar la informacion de los 
     * input del formulario registro del vigilante del archivo listar_vigilantes.php
     * 
     * getElementById    permite seleccionar un elemento del formulario registro 
     *                   por medio del valor del atributo id que se haya asignado.
     * 
	 * @var String documento 
	 * @var String nombre1
	 * @var String nombre2	
	 * @var String apellido1
	 * @var String apellido2
	 * @var String tipo
	 * @var String clave
	 * @var String correo 
	 * @var String foto   
	 */
    var docu,nom1,nom2,ape1,ape2,clave,tipo,correo,expresion,expre,expreFoto;
    docu = document.getElementById("docu").value;
    nom1 = document.getElementById("nom1").value;
    nom2 = document.getElementById("nom2").value;
    ape1 = document.getElementById("ape1").value;
    ape2 = document.getElementById("ape2").value;
    clave = document.getElementById("clave_e").value;
    tipo = document.getElementById("tipo_vi").value;
    correo = document.getElementById("correo").value;
	/**
	 * se definen las variables que contendran una combinacion de carácteres
     * dentro de una cadena de texto (expresiones regulares).
     * 
	 * @var String expresion  Contiene el patron de carácteres que solo permite la
     *                         estructura de un correo.
     *                         // : dentro debe ir el patron de carácteres.
     *                         \w: cualquier carácter alfanumerico.
     *                         +@: busca el @.
     *                         \. : la cadena de texto debe contener un punto.
     *                         +[a-z]: cualquier carácter que este de la a hasta la z. 	  
	 */
    expresion = /\w+@\w+\.+[a-z]/;
	/**
	 * @var String expre =	  Contiene el  patron que de caracteres que se debe  
     *                        llevar la contraseña, exigiendo una 
     *                         mayúscula, minúscula y un número:
     *                         //: dentro debe ir el patron de carácteres.
     *                         ^(?=.*\d): exige numeros.
     *                         (?=.*[a-z]): exige una minúscula.
     *                         (?=.*[A-Z]): exige una mayúscula.
     *                         .{0,30}$ : debe contener minimo 6 y maximo 30 carácteres.
	 */
    expre = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{0,30}$/;
	/**
	 * @var String expreFoto =	Contiene el pratron de caracteres que debe de llevar
     *                          la imagen.
     *                         //: dentro debe ir el patron de carácteres.
     *                         \.: l archivo debe de llevar un punto.
     *                         (jpg|png|gif)$ : El archivo seleccionado solo puede
     *                                          ser .jpg, .png, .gif.
     */
    expreFoto = /\.(jpg|png|gif)$/;
    /**
     * si las variables estan vacias mostrara una alerta..
     */
    if(docu === "" || nom1 === "" || ape1 === "" || clave === "" || tipo === "" || correo === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    /**
     * si la variable documento es mayor a 10 o menor a 8 caracteres se mostrara una alerta
     */
    else if(docu.length>10 || docu.length<8){
        alert("El documento no es correcto");
        return false;
    }
    /**
     * si las variables nombre1 o nombre2 son mayor a 46 caracteres, o si las variables
     * apellido1 o apellido2 son mayor a 50 caracteres se mostrara una alerta
     */
    else if(nom1.length>45 || nom1.length>45 || ape1.length>50 || ape2.length>50){
        alert("Los nombres y los apellidos estan muy largo");
        return false;
    }
    /**
     * si las variables nombre1 o nombre2 son menores a 3 caracteres, o si las variables
     * apellido1 o apellido2 son menores a 4 caracteres se mostrara una alerta
     */
    else if(nom1.length<=3 || nom1.length<=3 || ape1.length<4 || ape2.length<4){
        alert("Los nombres y los apellidos estan muy cortos");
        return false;
    }
    /**
     * si la variable clave es mayor a 80 o menor a 6 caracteres, se mostrara una alerta.
     */
    else if(clave.length>80 || clave.length<6){
        alert("la contraseña debe mas de 6 y menos de 80 caracteres");
        return false;
    }
    /**
     * si la variable correo es diferente a la variable expresion, se mostrara una alerta.
     */
    else if(!expresion.test(correo)){
        alert("El correo no es valido");
        return false;      
    }
    /**
     * si la variable clave es diferente a la variable expre, se mostrara una alerta.
     */
    else if(!expre.test(clave)){
        alert("La contraseña debe tener al menos una minuscula, mayuscula y un número");
        return false; 
    }
    /**
     * si la variable foto es diferente a la variable expreFoto, se mostrara una alerta.
     */
    else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }

}
/**
 * valida el campo de busqueda de elementos del archivo verificacion.php
 */ 
function validar_buscador(){
	/**
	 * se definen las variables para capturar la informacion del input
     * busqueda de elementos del archivo verificacion.php
     * 
     * getElementById    permite seleccionar un elemento del formulario registro 
     *                   por medio del valor del atributo id que se haya asignado.
     * 
	 * @var String documento
	 */
    var documento;
    documento = document.getElementById("bus").value;
    /**
     * si la variable esta vacia mostrara una alerta.
     */
    if(documento === ""){
        alert("El campo no puede estar vacio");
        return false;
    }
    /**
     * si la variable documento es mayor a 10 o menor a 8 caracteres se mostrara una alerta
     */ 
    else if(documento.length>10 || documento.length<8){
        alert("El documento no es correcto");
        return false;
    }

}
/**
 * valida el formulario registro del visitante en el archivo verificar.php
 */
function validar_visitante(){
	/**
	 * se definen las variables para capturar la informacion de los 
     * input del formulario registro del visitante en el archivo verificar.php
     * 
     * getElementById    permite seleccionar un elemento del formulario registro 
     *                   por medio del valor del atributo id que se haya asignado.
     * 
	 * @var String nombre 
	 * @var String descripcion
	 * @var String serial 
	 * @var String foto
	 * @var String documento
	 */
    var documen,nombre,descripcion,serial,foto,expreFoto;
    documen = document.getElementById("documen").value;
    nombre = document.getElementById("nom").value;
    descripcion = document.getElementById("descripcion").value;
    serial = document.getElementById("numero").value;
    foto = document.getElementById("btn-subir-foto").value;
	/**
	 * se definen las variables que contendran una combinacion de carácteres
     * dentro de una cadena de texto (expresiones regulares).
     * 
	 * @var String expreFoto =	Contiene el pratron de caracteres que debe de llevar
     *                          la imagen.
     *                         //: dentro debe ir el patron de carácteres.
     *                         \.: l archivo debe de llevar un punto.
     *                         (jpg|png|gif)$ : El archivo seleccionado solo puede
     *                                          ser .jpg, .png, .gif. 	  
	 */
    expreFoto = /\.(jpg|png|gif)$/;
    /**
     * si las variables estan vacias mostrara una alerta.
     */
    if(documen === "" || nombre === "" || descripcion === "" || serial === "" || foto === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    /**
     * si la variable documento es mayor a 10 o menor a 8 caracteres se mostrara una alerta
     */
    else if(documen.length>10 || documen.length<8){
        alert("El documento no es correcto");
        return false;
    }
    /**
     * si la variable nombre es menor a 4 caracteres, se mostrara una alerta.
     */
    else if(nombre.length<4){
        alert("El nombre esta muy corto");
        return false;
    }
    /**
     * si la variable nombre es mayor o igual a 50 caracteres, se mostrara una alerta.
     */
    else if(nombre.length>=50){
        alert("El nombre esta muy largo");
        return false;
    }
    /**
     * si la variable descripción es menor a 4 caracteres, se mostrara una alerta.
     */
    else if(descripcion.length<4){
        alert("La descripción esta muy corto");
        return false;
    }
    /**
     * si la variable descripción es mayor o igual a 110 caracteres, se mostrara una alerta.
     */
    else if(descripcion.length>=110){
        alert("La descripción esta muy largo");
        return false;
    }
    /**
     * si la variable serial es mayor o igual a 20 caracteres o menor a 6,
     * se mostrara una alerta.
     */
    else if(serial.length>=20 || serial.length<6){
        alert("El numero serial no es correcto");
        return false;
    }
    /**
     * si la variable foto es diferente a la variable expreFoto, se mostrara una alerta.
     */
    else if(!expreFoto.test(foto)){
        alert("El archivo a adjuntar no es una imagen");
        return false; 
    }
}