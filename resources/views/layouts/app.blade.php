<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet/less" href="/less/style.less">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="page-preloader" class="block-main-load">
        <div class="loading">
            <span class="ball1"></span>
            <span class="ball2"></span>
        </div>
     </div>
    <div class="main-block-content">
            @yield('content')
       
            <div class="footer-contacs-block">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="col-lg-3">
                        <p>Адрес</p>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> Москва, ул. Чистова 11А</p>
                    </div>
                    <div class="col-lg-3">
                        <p>Телефон</p>
                        <p><i class="fa fa-volume-control-phone" aria-hidden="true"></i> +7 (495) 665-84-35 (с 10:00 до 20:00)</p>
                    </div>
                    <div class="col-lg-3">
                        <p>Почта</p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> pastry.lab@alinamakarova.ru</p>
                    </div>
                    <div class="col-lg-3">
                        <p>Мы в соцсетях</p>
                        <img src="/media/icons/intagram.png" alt="">
                        <img src="/media/icons/vk.png" alt="">
                        <img src="/media/icons/faceBoock.png" alt="">
                    </div>              
                </div>   
            </div>
    </div>

        <div class="clear-block"></div>

    <div class="footer-copyright-block">
        <p>©2016 Все права защищены. <a href="https://motive.kz" target="blanck">Создание сайтов в астане "MOTIVE.kz"</a></p>
    </div>
    
    <script>
        $(window).load(function () {
            $('.main-block-content').stop().animate({'opacity':1},500);
            $('.block-main-load').stop().animate({'opacity':0},500);
            setTimeout(function(){
                $('.block-main-load').remove();
                $('html').css('overflow-y','scroll');                
            },500);
        });
    </script>
    <script src="/js/less.js"></script>
    <!-- Scripts -->
    <script src="/js/app.js"></script>

</body>
</html>
