@extends('layouts.app')

@section('content')
    <div id="login-block"></div>

    <div class="header-block">
        <div class="top-menu-mobile">
            <p>
                <i class="fa fa-bars" aria-hidden="true"></i>
                <a href="#"> Казакша </a>•
                <a href="#"> Русский </a>•
                <a href="#"> English </a>
            </p>            
        </div>
        <div class="header-language-line">
            
        </div>
        <div id="mobil-menu-block"></div> 
        
        <div class="header-block-video">
            <video id="headerVideo" src="./media/video/header.mkv" autoplay loop volume="0.5"></video>
        </div>
        <div class="header-block-content">
            <div class="col-lg-10 col-lg-offset-1 col-md-12">
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                    <div class="row">
                            <div class="fff hidden-xs hidden-sm">
                                <div class="header-language-line">
                                    <p>
                                        <a href="#"> Казахский </a>•
                                        <a href="#"> Русский </a>•
                                        <a href="#"> Английский </a>
                                        <span class="control-video">
                                        <span onclick="playVid()">Play</span> | 
                                        <span onclick="pauseVid()">Stop </span> | 
                                        <i class="fa fa-volume-off controll-video" aria-hidden="true" data-muted="false"></i></span>
                                    </p>
                                </div>
                                <nav class="header-top-menu">
                                    <ul>
                                        <li><a href="/">О нас</a></li>
                                        <li><a href="/fotootchety">Фотоотчеты</a></li>
                                        <li><a href="/raspisaniemr">Мастер классы</a></li>
                                        <li><a href="/pastrylaboratory">Онлайн м/к</a></li>
                                        <li><a href="#">Зара советует</a></li>
                                        <li><a href="#">Отзывы</a></li>
                                        <li><a href="#">Контакты</a></li>
                                    </ul>
                                </nav>
                                <div class="header-top-logo">
                                    <img src="/media/logo.png" alt="">
                                    <p class="header-mail-block">
                                        Получайте последние новости и уникальные<br> предложения от  Zaras Bakery 
                                        <button>Отправить</button><input type="text" placeholder="E-mail">
                                    </p>
                                </div>
                            </div>       
                    </div>
                    </div>
                    <div class="col-lg-3 col-md-4 hidden-xs hidden-sm">
                        <div class="register-block">
                            @if (Auth::guest())
                                <span class="header-login-cabinet" id="login-cabinet"><a href="#">Войти</a></span><span class="header-social">Поделиться</span>
                                <p class="header-register">Регистрация</p>

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                    
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="col-lg-12 col-md-12">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Имя" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-lg-12 col-md-12">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="col-lg-12 col-md-12">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Пароль" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Повторить пароль" required>
                                        </div>
                                    </div>
                                 
                                    <script>

                                        function checkFo() {
                                            
                                            var mailCheck = $('#headerCheck').attr('data-checked-mail');
                                           
                                            if(mailCheck == 'false'){
                                                
                                                $('#headerCheck').attr('data-checked-mail','true');
                                                $(document).find('.checkbox-block-img img').addClass('addAnim');
                                            }else{
                                                $('#headerCheck').attr('data-checked-mail','false');
                                                $(document).find('.checkbox-block-img img').removeClass('addAnim');
                                            }   
                                        }
                                    </script>

                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="main-after-form-block">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="row">
                                                            <div class="checkbox-block">
                                                                <input type="checkbox" id="headerCheck" data-checked-mail="false" onclick="checkFo()">
                                                                <div class="checkbox-block-img">
                                                                    <img src="/media/icons/check.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8">
                                                        <div class="row">
                                                            <p>Хочу получать новости и информацию 
                                                            о новых курсах на почту</p>
                                                        </div>
                                                         
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <p>Продолжая регистрацию, вы принимаете 
                                                Пользовательское соглашение
                                            </p>
                                            <button type="submit" class="btn btn-primary">
                                                Регистрация
                                            </button>
                                        </div>
                                    </div> 
                                </form>
                            @else
                                <div class="login-info-block hidden-xs hidden-sm">
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Выход
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    <div class="clear-block"></div>
                                    <div class="auth-menu">
                                        <p><i class="fa fa-user" aria-hidden="true"></i>  {{ Auth::user()->name }} </p>
                                        <p><i class="fa fa-envelope" aria-hidden="true"></i>  {{ Auth::user()->email }} </p>
                                        <p><i class="fa fa-money" aria-hidden="true"></i>  {{ Auth::user()->users_balans }} тг </p>
                                        <a href="/mainvideo"> Мои видео курсы </a>
                                    </div>                                
                                </div>
                            @endif
                        </div>
                    </div>                   
                </div>
            </div> 
        </div>
    </div>

    <div class="clear-block"></div>

    <div class="content-center-block">
        <div class="o-nas">
            <div class="o-nas-title">
                <p>О нас</p>
            </div>
            <div class="container">

                <div class="col-lg-4 o-nas-slider-block">
                    <div class="onas-sliders-window">
                        <div class="onas-slider noactiveslide">
                            <img src="/media/slide1-onas.jpg" alt="">
                            <div></div> 
                        </div>
                        <div class="onas-slider noactiveslide">
                            <img src="/media/slide1-onas.jpg" alt="">
                            <div></div>
                        </div>
                        <div class="onas-slider noactiveslide">
                            <img src="/media/slide1-onas.jpg" alt="">
                            <div></div>
                        </div>
                        <div class="onas-slider noactiveslide">
                            <img src="/media/slide1-onas.jpg" alt="">
                            <div></div>
                        </div>                        
                    </div>
                    <div class="slider-controlOnas">
                      <ul></ul>
                    </div>            
                </div>
                    <script type="text/javascript">
                                
                        var sliderOnasLength = $('.onas-slider').length;
                        var slideOnasWidth = $(document).find('.onas-slider').eq(0).width()-100;
                        var g = 0;

                        for(g;g<sliderOnasLength;g++){
                            $('.onas-slider').eq(g).css({'left':slideOnasWidth*g+10});
                        }
                        $('.onas-slider').eq(0).addClass('onas-slider-active');
                        var nextOnasSlide = 0;
                        var ControlPoint = 0;
                        var buttonOnasLength = 0;
                      
                        for(ControlPoint; ControlPoint < sliderOnasLength ; ControlPoint++){
                            $('.slider-controlOnas ul').append('<li></li>');
                        }

                        $('.slider-controlOnas ul li').on('click', function(){
                            nextOnasSlide = $(this).index();
                            if(nextOnasSlide>=buttonOnasLength){       
                                $('.onas-sliders-window').stop().animate({
                                    'left':-((nextOnasSlide*slideOnasWidth)-(slideOnasWidth/2))
                                },1000);   
                                
                                    $('.onas-slider').addClass('noactiveslide');
                                    $('.onas-slider').removeClass('onas-slider-active');
                                    $('.onas-slider').eq(nextOnasSlide).removeClass('noactiveslide');
                                    $('.onas-slider').eq(nextOnasSlide).addClass('onas-slider-active');
                                
                                nextOnasSlide++;                               
                            }else{
                                nextOnasSlide = 0;
                                $('.onas-slider').removeClass('onas-slider-active');
                                $('.onas-sliders-window').stop().animate({
                                    'left':-nextOnasSlide*slideOnasWidth
                                },1000);
                            }
                        });
                        function nextSlide(){

                            ++nextOnasSlide;

                                if(nextOnasSlide >= sliderOnasLength){

                                nextOnasSlide = 0;

                                $('.onas-sliders-window').stop().animate({
                                    'left':-((nextOnasSlide*slideOnasWidth)-(slideOnasWidth/2))
                                }, 1000);

                                $('.onas-slider').removeClass('onas-slider-active');
                                $('.onas-slider').eq(0).addClass('onas-slider-active');

                                $('.slider-controlOnas ul li').removeClass('active-control-slide');
                                $('.slider-controlOnas ul li').eq(nextOnasSlide).addClass('active-control-slide');

                            }else{

                                $('.onas-sliders-window').stop().animate({
                                    'left':-((nextOnasSlide*slideOnasWidth)-(slideOnasWidth/2))
                                }, 1000);

                                $('.onas-slider').addClass('noactiveslide');
                                $('.onas-slider').removeClass('onas-slider-active');
                                $('.onas-slider').eq(nextOnasSlide).removeClass('noactiveslide');
                                $('.onas-slider').eq(nextOnasSlide).addClass('onas-slider-active');

                                $('.slider-controlOnas ul li').removeClass('slider-controlOnas');
                                $('.slider-controlOnas ul li').eq(nextOnasSlide).addClass('active-control-slide');

                            }
                        }

                        var setIntOnasSlider = setInterval(nextSlide, 2000);

                        $('.o-nas-slider-block').hover(function(){
                            clearInterval(setIntOnasSlider);
                        }, function(){
                            setIntOnasSlider = setInterval(nextSlide, 2000);
                        });
                        

                        $('.onas-slider').removeClass('active-slide');
                        $('.onas-slider').eq().addClass('active-slide');

                        $('.slider-controlOnas ul li').removeClass('active-control-slide');
                        $('.slider-controlOnas ul li').eq(nextOnasSlide).addClass('active-control-slide');
                        

                    </script>
                    <div class="col-lg-8">
                        <p>
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст
                            О нас текст О нас текст О нас текст О нас текст О нас текст О нас текст                            
                        </p>                        
                    </div>
            </div>
        </div>

        <div class="clear-block"></div> 
          
        <div class="master-class-block">
            <div class="master-class-title">
                <p>Мастер-класс</p>
            </div>
            <div class="container master-class-container">
                <div class="col-lg-3 col-md-3">
                    <div class="master-class-content">
                        <p>с 1 ноября
                        по 31 декабря</p>
                        <p><span class="master-class-lubitel">Любителям</span></p>
                        <p><span class="master-class-profi">Проффессионалам</span></p>
                        <h3>Астана</h3>
                    </div> 
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="master-class-content">
                        <p>с 1 ноября
                        по 31 декабря</p>
                        <p><span class="master-class-lubitel">Любителям</span></p>
                        <p><span class="master-class-profi">Проффессионалам</span></p>
                        <h3>Астана</h3>
                    </div>                     
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="master-class-content">
                        <p>с 1 ноября
                        по 31 декабря</p>
                        <p><span class="master-class-lubitel">Любителям</span></p>
                        <p><span class="master-class-profi">Проффессионалам</span></p>
                        <h3>Астана</h3>
                    </div>                     
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="master-class-content">
                        <p>с 1 ноября
                        по 31 декабря</p>
                        <p><span class="master-class-lubitel">Любителям</span></p>
                        <p><span class="master-class-profi">Проффессионалам</span></p>
                        <h3>Астана</h3>
                    </div>                     
                </div>
                <a href="/raspisaniemr"class="next-info"><span>Перейти на страницу<br> расписания МК</span></a> 
            </div>
        </div>

        <div class="clear-block"></div>

        <div class="online-master-class">
            <div class="online-master-title">
                <p>Онлайн мастер-классы от Pastry Laboratory</p>
            </div>
            <div class="container online-master-class-container">
                <div class="online-master-content">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 online-master-block">
                                <div class="online-master-scroll">
                                    <div class="online-master-slid">
                                        <img src="/media/products/desertYagodnyu.jpg" alt="">
                                    </div>
                                    <div class="online-master-slid">
                                        <img src="/media/products/tortPink.jpg" alt="">
                                    </div>
                                    <div class="online-master-slid">
                                        <img src="/media/products/tortYagodnyi.jpg" alt="">
                                    </div>
                                    <div class="online-master-slid">
                                        <img src="/media/products/desertYagodnyu.jpg" alt="">
                                    </div>                                   
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <h3>Онлайн мастер-классы это:</h3>
                                <p>
                                    Только авторские рецепты
                                    Возможность учиться, не выходя из дома
                                    Доступный и максимально понятный материал
                                    Консультации и обратная связь от Шеф-кондитера
                                    Доступность курсов без ограничений c любого устройства
                                    Курсы разной сложности
                                </p>   
                            </div>                    
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ControlOnMas">
                            <ul></ul>
                        </div>
                    </div><div class="col-lg-8"></div>                
                </div>
                <a href="/pastrylaboratory" class="next-info"><span>Перейти на страницу<br>Pastry Laboratory</span></a>   
            </div>
        </div>

        <div class="clear-block"></div>

        <div class="zara-sovetuet">
            <div class="zara-sovetuet-title">
                <p>Рубрика Zara советует</p>
            </div>
            <div class="container">
                <div class="torts-blocks">
                    <div class="torts-blocks-scroll">
                        @foreach($zaraSovets as $zaraSovet)
                            <div class="col-lg-3 slide-block">
                                <div class="torts">
                                        <div class="torts-img">
                                            <img src="{{$zaraSovet->zara_sovets_img}}" alt="">
                                            <div class="tort-hover"><i class="fa " aria-hidden="true"></i></div>
                                        </div>
                                    <p>{{$zaraSovet->zara_sovets_name}}</p>
                                    <p>{{$zaraSovet->zara_sovets_price}} тг</p>
                                    <button>Подробнее</button>                        
                                </div>
                            </div>
                        @endforeach                      
                    </div>
                    <div class="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                    <div class="prevent"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>    
                </div>
                <div class="slider-control">
                    <ul></ul>
                </div>     
            </div>
            <script type="text/javascript">

                $('.torts-img').hover(function(){
                    $(this).find('i').addClass('fa-eye');
                },function(){
                    $('.torts-img i').removeClass('fa-eye');
                });

                var slideWidth = $('.slide-block').eq(0).width()+30;
                var slideLength = $('.slide-block').length;
                var i = 0;

                for(i;i<slideLength;i++){

                    $('.slide-block').eq(i).css({'left':slideWidth*i});

                }

                //control slider

                var buttonLength = slideLength-3;
                var nextSlidesss = 0;
                var l = 0;

                for(l;l<buttonLength;l++){
                    $('.slider-control ul').append('<li></li>');
                }

                $('.slider-control ul li').on('click', function(){
                    nextSlidesss = $(this).index();
                    if(nextSlidesss>=buttonLength){
                        nextSlidesss = 0;
                        $('.torts-blocks-scroll').stop().animate({
                            'left':-nextSlidesss*slideWidth
                        },500);
                    }else{
                        $('.torts-blocks-scroll').stop().animate({
                            'left':-nextSlidesss*slideWidth
                        },500);
                    }
                });
                
                $('.next').on('click',function(){
                    var SlideBlockLength= buttonLength - 2;
                    if(nextSlidesss<=SlideBlockLength){
                         nextSlidesss++;
                         $('.torts-blocks-scroll').stop().animate({
                            'left':-nextSlidesss*slideWidth
                         },500);
                    }else{
                        nextSlidesss = 0;
                        $('.torts-blocks-scroll').stop().animate({
                            'left':-nextSlidesss*slideWidth
                        },500);     
                    }
                });

                $('.prevent').on('click',function(){
                    var SlideBlockLength = buttonLength -1;

                    if(nextSlidesss<=SlideBlockLength && nextSlidesss > 0){
                         nextSlidesss--;
                         $('.torts-blocks-scroll').stop().animate({
                            'left':-nextSlidesss*slideWidth
                         },500);
                    }else{
                        nextSlidesss = SlideBlockLength;
                        $('.torts-blocks-scroll').stop().animate({
                            'left':-nextSlidesss*slideWidth
                        },500);     
                    }
                });  

                function nextZaraSov(){

                    nextSlidesss++;
                    if(nextSlidesss<=buttonLength-1){
                        
                         $('.torts-blocks-scroll').stop().animate({
                            'left':-nextSlidesss*slideWidth
                         },500);
                    }else{
                        nextSlidesss = 0;
                        $('.torts-blocks-scroll').stop().animate({
                            'left':-nextSlidesss*slideWidth
                        },500);     
                    }
                }

         /*       var setIntZaraSovSlider = setInterval(nextZaraSov, 3400);
                $('.torts-blocks').hover(function(){
                    clearInterval(setIntZaraSovSlider);
                }, function(){
                    setIntZaraSovSlider = setInterval(nextZaraSov, 3400);
                });
*/
                window.onload = function(){

                    var slideHeight = $('.torts').height()+20;
                    $('.torts-blocks').css('height',slideHeight);

                }
            </script>     
        </div>
    </div>

    <div class="clear-block"></div>

    <div class="ozivy-block">
        <div class="ozivy-title">
            <p>Отзывы</p>
        </div>
        <div class="container">
            <div class="ozivy-child-block">
                <div class="ozivy-scroll-block">
                    @foreach($otzives as $otzivy)
                        <div class="col-lg-3 otzivy">
                            <div class="otziv">
                                <h3>{{$otzivy->otzivies_user_name}}</h3>
                                <h4>{{$otzivy->otziv_product}}</h4>
                                <p>{{$otzivy->otziv_text}}</p>
                            </div>
                        </div>
                    @endforeach 
                </div>              
            </div>
            <div class="controll-otzovy">
                <ul></ul>
            </div>   
        </div>
        <script>
            var otzivyLength = $('.otzivy').length;
            var otzovyWidth = $('.otzivy').eq(0).width()+30;
            var j = 0;

            for(j;j <= otzivyLength; j++){
                $('.otzivy').eq(j).css({'left':otzovyWidth*j});
            }

            var buttonOtzivLength = otzivyLength-4;
            var nextOtziv = 0;
            var w = 0;

            for(w;w<=buttonOtzivLength;w++){
               $('.controll-otzovy ul').append('<li></li>');
            }

            $('.controll-otzovy ul li').on('click', function(){
                nextOtziv = $(this).index();
                if(nextOtziv>buttonOtzivLength){
                    nextOtziv = 0;
                    $('.ozivy-scroll-block').stop().animate({
                        'left':-nextOtziv*otzovyWidth
                    },500);
                }else{
                    $('.ozivy-scroll-block').stop().animate({
                        'left':-nextOtziv*otzovyWidth
                    },500);
                }
            });

            function nextOzyv(){
                ++nextOtziv;

                if(nextOtziv > buttonOtzivLength){

                    nextOtziv = 0;

                    $('.ozivy-scroll-block').stop().animate({
                        'left':-nextOtziv*otzovyWidth
                    },500);

                }else{

                    $('.ozivy-scroll-block').stop().animate({
                        'left':-nextOtziv*otzovyWidth
                    },500);
                }
            }

            var setIntOtzyvSlider = setInterval(nextOzyv, 2000);
            $('.ozivy-child-block').hover(function(){
                clearInterval(setIntOtzyvSlider);
            }, function(){
                setIntOtzyvSlider = setInterval(nextOzyv, 2000);
            });


        /*Логин блок*/

        $(document).on('click', '#login-cabinet', function(){
            $('#login-block').html('<div class="container" style="padding:20px 0; position:relative"><i class="fa fa-times-circle-o" aria-hidden="true"></i><div class="row"><div class="col-md-8 col-md-offset-2"><div class="panel panel-default"><div class="panel-heading">Войти</div><div class="panel-body"><form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}"> {{ csrf_field() }} <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"><label for="email" class="col-md-4 control-label">E-Mail адрес</label><div class="col-md-6"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> @if ($errors->has('email')) <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span> @endif </div></div><div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"><label for="password" class="col-md-4 control-label">Пароль</label><div class="col-md-6"><input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password')) <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span> @endif </div></div><div class="form-group"><div class="col-md-6 col-md-offset-4"><div class="checkbox"><label><input type="checkbox" name="remember"> Запомнить меня </label></div></div></div><div class="form-group"><div class="col-md-12 col-lg-12"><button type="submit" class="btn btn-primary"> ВОЙТИ </button><a class="btn btn-link" href="{{ url('/password/reset') }}"> Забыли свой пароль? </a></div></div></form></div></div></div></div></div>');
        });

        $(document).on('click', '.fa-times-circle-o', function(){
            $('#login-block').html('');
        });

        /* логин конец */

        $(document).on('click', '.mobil-menu span', function(){
            $('#mobil-menu-block').html('');
        });

        $('.fa-bars').on('click', function(){
            $('#mobil-menu-block').html('<nav class="mobil-menu hidden-lg hidden-md"><div style="display:table; float:right; width: 100%;background: rgb(227, 152, 167);" ><span id="login-cabinet" style="float:left;"><a href="#" style="display:inline">Войти</a></span><span ><a href="/register" style="display:inline">Регистрация</a></span></div><div class="clear-block"></div><ul><li><a href="/">О нас</a></li><li><a href="/fotootchety">Фотоотчеты</a></li><li><a href="/raspisaniemr">Мастер классы</a></li><li><a href="/pastrylaboratory">Онлайн м/к</a></li><li><a href="#">Зара советует</a></li><li><a href="#">Отзывы</a></li><li><a href="#">Контакты</a></li><li><span><i class="fa fa-caret-square-o-up" aria-hidden="true"></i></span></li></ul></nav>');
        });

        </script>

        
    </div>
    <script src="/js/custom.js"></script>
@endsection

