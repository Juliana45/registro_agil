/*Con este documento se realiza el scroll del logo */
$(document).ready(function(){
	
	/*El flag y el scroll sin variables relacionadas con indicadores */
	var flag = false;
	var scroll;

	/*El método Window.scroll() desplaza el logo a un lugar particular(centro de la ventana) */
	$(window).scroll(function(){
		/*En la variable scroll se guarda la altura de la ventana para ubicar el logo*/
		scroll = $(window).scrollTop();

		/*Si Scroll es mayor a 200 y el indicador flag no es "false" */
		if (scroll > 200){
			if (!flag) {
				/*Entonces el logo se ubicará segun las medidas que se les esta dando en este css */
				$("#logo").css({"margin-top": "82%", "width": "125px", "height": "75px", "margin-left": "-50px"});
				/*Y el header cambiara al color que se le indica en el css*/
				$("header").css({"background-color": "rgba(12,12,12,0.75)"});

				flag = true;
			}
		}else{
			/*Si Scroll es menor a 200 y el indicador flag es "false" */
			if (flag) {
				/*Entonces el logo se ubicará segun las medidas que se les esta dando en este css */
				$("#logo").css({"margin-top": "468%", "width": "100px", "height": "80px","margin-left": "575%"});
				/*Y el header cambiara al color que se le indica en el css*/
				$("header").css({"background-color": "rgba(12,12,12,0.75)"});
				/*Nuevamente retornando el indicador "flag" "false"  */
				flag = false;
			}
		}
	});

});