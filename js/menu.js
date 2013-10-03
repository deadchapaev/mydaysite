$(document).ready(function(){
		$(".usrmenulvl1item").click(function(){

			if($(this).hasClass('usrmenulvl1item')) {
				var a = $(this).children[1];
				a.css({ height: 10,display: 'block' });


			}
			{
				toShow = $(this).next();
				toHide = $(".usrmenulvl1item .usrmenulvl2-hidden");
				
				staticheight = toHide.height(); //определить высоту блоков
				toShow.css({ height: 10,display: 'block' }); // открываемый делаем "видимым" с высотой 0, теперь он готов к анимации
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
				$('.usrmenulvl2-hidden').removeClass('usrmenulvl2');
				$(this).addClass('usrmenulvl2');
				}
			return;
		});
	});