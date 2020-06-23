/**
* Efecto de scroll en el logo que esta ubicado en el archivo index.php.
* 
* Se inicializa la función.
*/
$(document).ready(function(){
	/**
	* @var boolean flag		
	* @var String scroll 	Se almacena la función del escroll cuando este se haga en el index.
	*/	
	var flag = false;
	var scroll;
		/**
		* Cada vez que que se haga scroll en el index ejecute la función. 
		*/
	$(window).scroll(function(){
		scroll = $(window).scrollTop();
		/**
		* Cuando el scroll sea mayor a 200 la imagen se sube al menú.
		*/
		if (scroll > 200){
			if (!flag) {
			/**
			* Se modifica el tamaño del logo para que se posicione en la esquina 
			* superior izquierda de la pantalla.
			*/
				$("#logo").css({"margin-top": "82%", "width": "125px", "height": "75px", "margin-left": "-50px"});
				/**
				* Se le asigna un color al header.
				*/
				$("header").css({"background-color": "rgba(12,12,12,0.75)"});

				flag = true;
			}
		}else{
			/**
			 * Si el scroll es menor a 200 el logo queda en su tamaño normal.
			 */
			if (flag) {
				/**
				* Se le asignan el tañamano inicial del logo.
				*/
				$("#logo").css({"margin-top": "468%", "width": "100px", "height": "80px","margin-left": "575%"});
				/**
				* Se le asigna un color al header .
				*/
				$("header").css({"background-color": "rgba(12,12,12,0.75)"});

				flag = false;
			}
		}
	});
});





