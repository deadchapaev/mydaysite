$(document).ready(function(){
	$(".usrmenulvl1item").click(function(){
		if($(this).hasClass('usrmenulvl1item')) {
			// do smth
		} else {
			toShow = $(this).next();
			toHide = $(".usrmenulvl1item usrmenulvl2:visible");
				
			staticheight = toHide.height(); //определить высоту блоков
			
			toShow.css({ height: 0, display: 'block'}); // открываемый делаем "видимым" с высотой 0, теперь он готов к анимации
			toHide.animate({height:"hide"},{ //
			step: function(now) {
						var current = staticheight - now;
						if ($.browser.msie || $.browser.opera || $.browser.safari) {
							current = Math.ceil(current);
						}
						toShow.height( current);
					},
					duration: 500
				});
				//setting classes
				$('.usrmenulvl1').removeClass('usrmenulvl1item');
				$(this).addClass('usrmenulvl1item');
				}
			return;
		});
	});
