@extends('layouts.app')
@section('content')
	<div class="mk-table-popup-blok">
		<div id="tablePopupBg">
			
		</div>
	</div>
<div class="pas-mr-bg-block">
	@include('menu')
	<div class="header-pas-mr">
		<div class="header-pas-mr-logo">
			<img src="/media/logo.png" alt="">
			<h1>Расписание мастер-классов</h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="pas-mr-content">
				<div class="col-lg-12">
					<div class="mouns-mrclass">
							<li data-month-id="0">Все</li>
						@foreach($CategorysMonths as $CategorysMonth)
							<li data-month-id="{{$CategorysMonth->category_id}}">{{$CategorysMonth->category_name}}</li>
						@endforeach
					</div>
				</div>
				<div class="clear-block"></div>
				
				<div class="courses-block-ajax">
					<div class="load-block-main"><i class="fa fa-cog" aria-hidden="true"></i></div>
					<div class="courses-block-ajax-load"></div>
				</div>	
				
			</div>			
		</div>
	</div>

</div>

	<script>

		function loadCouses(id, url, contentClass){
			$('.load-block-main').addClass('load-block-main-open');
			$.ajax({
				'url':url,
				'type':'get',
				'typedata':'text',
				'data':{
					'_token':'{{csrf_token()}}',
					'id':id
				},
				success(data){
					$('.load-block-main').removeClass('load-block-main-open');
					$(contentClass).html(data);
				}
			});
		}

		$('.mouns-mrclass li').on('click', function(){
			var id = $(this).attr('data-month-id');
			loadCouses(id, '/offlinecurses', '.courses-block-ajax-load');
		});

		loadCouses(0, '/offlinecurses', '.courses-block-ajax-load');

		$(document).on('click', '.pas-mr-info-hover button',function(){

			var idCours = $(this).attr('data-course-ajax-id');

			loadCouses(idCours, '/offlinepopup', '.mk-table-popup-blok');

			$(document).on('click', '.fa-times-circle-o', function(){
				$(document).find('.mk-table-popup-blok').html('');
			});

		});



	</script>



@endsection
