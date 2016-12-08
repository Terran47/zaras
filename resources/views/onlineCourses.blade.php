@extends('layouts.app')
@section('content')

<div class="online-mr-courses-block">
		@include('menu')
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
				<img src="/media/header-tort.png" style="width:100%;margin-top: 15px;" alt="">
				<div class="nashy-shefy">
					<img src="{{$shefInfos->category_img}}" alt="">
					<h3>{{$shefInfos->category_name}}</h3>
					<p>{{$shefInfos->category_description}}</p>
				</div>
				<img src="/media/prosloika.jpg" style="width:100%;" alt="">				
			</div>

			<div class="col-lg-12 col-md-12 online-mr-course-list">
				<div class="row">
					<div class="online-videofilter-block">
							<li data-filter-id="0">Все</li>
						@foreach($categoryFilters as $categoryFilter)
							<li data-filter-id="{{$categoryFilter->id}}">{{$categoryFilter->category_name}}</li>
						@endforeach
					</div>
					<div class="clear-block"></div>
					<div class="online-mr-course" data-shef-id="{{ $shef_id }}">	
						<div id="load-list-block">
							<div class="load-block-main"><i class="fa fa-cog" aria-hidden="true"></i></div>					
						</div>
					</div>
				</div>
			</div>
			<img src="/media/prosloika.jpg" style="width:100%;height: 50px;" alt="">			
		</div>
	</div>

	<div id="popup-video-block"></div>
</div>

	<script>
		
		var shefID = $('.online-mr-course').attr('data-shef-id');

		$(document).on('click', '.looking', function(){
			var videoCourseID = $(this).attr('data-video-id');

			$.ajax({
				url:'/onlinevideo',
				type: 'post',
				data:{
					'_token':'{{ csrf_token() }}',
					'videoCourseID':videoCourseID
				},
				success(data){
					var course = JSON.parse(data);
					
					$('#popup-video-block').css('visibility','visible');
					$('#popup-video-block').append(
						'<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">'+
							'<div class="popup-video-content">'+
								'<i class="fa fa-times-circle-o" aria-hidden="true"></i>'+
								'<h3>'+course.purchased_courses_title+'</h3><hr>'+
								'<p>При неполадках с видео (не работает, без звука) - попробуйте открыть курс через другой браузер или устройство. Спасибо за понимание!</p>'
								+'<video id="headerVideo" src="'+course.purchased_courses_video+'" volume="0.5" controls></video>'

							+'</div>'+
						'</div>'
					);
				}
			});

		});

		$(document).on('click', '.fa-times-circle-o', function(){
			$('#popup-video-block').html('');
			$('#popup-video-block').css('visibility','hidden');
		});

		loadCouses(0, '/onlinecurses', '#load-list-block', shefID);

		$('.online-videofilter-block li').on('click', function(){
			var filterID = $(this).attr('data-filter-id');

			loadCouses(filterID, '/onlinecurses', '#load-list-block', shefID);
		});

		$(document).on('click', '.pas-mr-info-hover button',function(){

			var idCours = $(this).attr('data-course-ajax-id');

			loadCouses(idCours, '/offlinepopup', '.mk-table-popup-blok');

			$(document).on('click', '.fa-times-circle-o', function(){
				$(document).find('.mk-table-popup-blok').html('');
			});

		});	

			function loadCouses(id, url, contentClass, shef_id){
				$('.load-block-main').addClass('load-block-main-open');
				$.ajax({
					'url':url,
					'type':'get',
					'typedata':'text',
					'data':{
						'_token':'{{csrf_token()}}',
						'filterID':id,
						'shefID':shef_id
					},
					success(data){
						$('.load-block-main').removeClass('load-block-main-open');
						$(contentClass).html(data);
					}
				});
			}	

	</script>
	



@endsection