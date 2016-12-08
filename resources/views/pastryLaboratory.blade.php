@extends('layouts.app')
@section('content')

	<div class="header-block">
        <div class="header-block-video cocs">
            <video id="headerVideo" src="./media/video/cocs-header.mkv" autoplay loop volume="0.5"></video>
        </div>
	        <div class="header-block-content">
	            <div class="col-lg-10 col-lg-offset-1 col-md-12">
	                <div class="col-lg-12 col-md-12">
	                    <div class="fff">
	                        <div class="header-language-line">
	                            <p><span class="control-video"><span onclick="playVid()">Play</span> | <span onclick="pauseVid()">Stop </span> | <i class="fa fa-volume-off controll-video" aria-hidden="true" data-muted="false"></i></span></p>
	                        </div>                
	                            @include('menu')
	                        <div class="header-top-logo-cocs">
	                            <img src="/media/logo.png" alt="">
	                            <h1>PASTRY LABORATORY <br> by Zara's Bakery</h1>
	                        </div>
	                    </div>       
	                </div> 
	            </div> 
	        </div>        	
    </div>
	
	<div class="nashy-shefy-block">
		<div class="nashy-shefy-title">
			<h2>Наши шефы</h2>
		</div>
		<div class="container">
			@foreach($shefs as $shef)
				<div class="col-lg-6">
					<div class="nashy-shefys">
						<img src="{{$shef->category_img}}" alt="">
						<p>{{$shef->category_description}}</p>
						<a href="/onlinecourses/{{$shef->id}}"><button>Онлайн рецепты повара</button></a>
					</div>				
				</div>
			@endforeach
		</div>
	</div>
    <script src="/js/custom.js"></script>	
@endsection