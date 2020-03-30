$(document).ready(function(){
	
	var flag = false;
	var scroll;

	$(window).scroll(function(){
		scroll = $(window).scrollTop();

		if (scroll > 200){
			if (!flag) {
				$("#logo").css({"margin-top": "82%", "width": "125px", "height": "75px", "margin-left": "-50px"});
				$("header").css({"background-color": "rgba(12,12,12,0.75)"});

				flag = true;
			}
		}else{
			if (flag) {
				$("#logo").css({"margin-top": "468%", "width": "100px", "height": "80px","margin-left": "575%"});

				$("header").css({"background-color": "rgba(12,12,12,0.75)"});

				flag = false;
			}
		}
	});

});





