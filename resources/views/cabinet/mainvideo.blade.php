@extends('layouts.app')
@section('content')

	
	<div class="main-video-blocks">

		@include('menu')
		
		<div id="popup-video-block"></div>

		<div class="container">
			<div class="row">
				<?php $count = 1; ?>
				@foreach($mainVideos as $mainVideo)
					<div class="col-lg-12">
						<div class="main-video">
							<div class="row">
								<div class="col-lg-1 col-md-1">
									{{ $count++ }}
								</div>
								<div class="col-lg-6 col-md-6">
									{{ $mainVideo->purchased_courses_title }}
								</div>
								<div class="col-lg-3 col-md-3">
									<span class="tolook" data-curs-id="{{ $mainVideo->purchased_courses_course_id }}">смотреть</span>
								</div>
								<div class="col-lg-2 col-md-2">
									<span>время: {{ $time }}</span>
								</div>
							</div>
						</div>						
					</div>
				@endforeach					
			</div>		
		</div>
	</div>
	
	<script>

		$(document).on('click', '.tolook', function(){
			var videoCourseID = $(this).attr('data-curs-id');

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

	</script>
@endsection