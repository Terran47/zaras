/* Видео в шапке на главной */
	var mutedVideo = document.getElementById('headerVideo');

	mutedVideo.muted = true;

	$(document).on('click','.controll-video', function(){

		var muted = $(this).attr('data-muted');

		if(muted == 'false'){

			mutedVideo.volume = 0.2;
			$('.controll-video').removeClass('fa-volume-off');
			$('.controll-video').addClass('fa-volume-up');
			$(document).find('.controll-video').attr('data-muted','true');

			mutedVideo.muted = false;

		}else{

			$('.controll-video').removeClass('fa-volume-up');
			$('.controll-video').addClass('fa-volume-off');
			$('.controll-video').attr('data-muted','false');

			mutedVideo.muted = true;

		}
		
	});

	var vid = document.getElementById("headerVideo");

	function playVid() {
	    vid.play();
	}

	function pauseVid() {
	    vid.pause();
	}
/* конец Видео в шапке на главной */

/* Слайдер Мастер классы */

	var onlineMasterLength = $('.online-master-slid').length;
	var onlineMasterWidth = $('.online-master-slid').eq(0).width()-100;

	var x = 0;
	for (x; x <= onlineMasterLength; x++) {
		$('.online-master-slid').eq(x).css({'left':onlineMasterWidth*x+20});
	}

    $('.online-master-slid').eq(0).addClass('online-slid-active');

    var IndexOnMasSlide = 0;
    var ControlOnMas = 0;
    var buttonOnMasLength = 0;
  
    for(ControlOnMas; ControlOnMas < onlineMasterLength ; ControlOnMas++){
        $('.ControlOnMas ul').append('<li></li>');
    }

	$('.ControlOnMas ul li').on('click', function(){
        IndexOnMasSlide = $(this).index();
        if(IndexOnMasSlide>=buttonOnMasLength){       
            $('.online-master-scroll').stop().animate({
                'left':-((IndexOnMasSlide*onlineMasterWidth)-(onlineMasterWidth/2))
            },1000);   
            
            $('.online-master-slid').removeClass('online-master-active');
            $('.online-master-slid').eq(IndexOnMasSlide).addClass('online-master-active');
            
            IndexOnMasSlide++;                               
        }else{
            IndexOnMasSlide = 0;
            $('.online-master-slid').removeClass('online-master-active');
            $('.online-master-scroll').stop().animate({
                'left':-IndexOnMasSlide*onlineMasterWidth
            },1000);
        }
    });    

	function nextOnMasSlide(){
        ++IndexOnMasSlide;
    	if(IndexOnMasSlide >= onlineMasterLength){
    		IndexOnMasSlide = 0;
            $('.online-master-scroll').stop().animate({
                'left':-((IndexOnMasSlide*onlineMasterWidth)-(onlineMasterWidth/2))
            },1000);   
            
            $('.online-master-slid').removeClass('online-master-active');
            $('.online-master-slid').eq(IndexOnMasSlide).addClass('online-master-active');                              
        }else{
            $('.online-master-scroll').stop().animate({
                'left':-((IndexOnMasSlide*onlineMasterWidth)-(onlineMasterWidth/2))
            }, 1000);
            $('.online-master-slid').removeClass('online-master-active');
            $('.online-master-slid').eq(IndexOnMasSlide).addClass('online-master-active');

            $('.ControlOnMas ul li').removeClass('ControlOnMas');
            $('.ControlOnMas ul li').eq(IndexOnMasSlide).addClass('active-ControlOnMas');
        }
    }


    var setIntOnMasSlider = setInterval(nextOnMasSlide, 2000);

    $('.online-master-block').hover(function(){
        clearInterval(setIntOnMasSlider);
    }, function(){
        setIntOnMasSlider = setInterval(nextOnMasSlide, 2000);
    });


/* конец Слайдер Мастер классы*/



