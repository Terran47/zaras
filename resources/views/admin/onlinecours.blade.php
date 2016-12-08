@extends('layouts.app')
@section('content')


	
	<div class="nashy-shefy-block">
		<div class="nashy-shefy-title">
			<h2>Наши шефы</h2>
		</div>
			@include('admin.menu')
		<div class="container">
			
			<div class="add-new-shef">
				<div class="col-lg-12">
					<input type="file" name="avatar">
					<textarea name="description" style="float:left;margin-right:15px;" placeholder="Описание"></textarea>
					<input type="hidden" value="{{ csrf_token() }}" name="_token">
					<input type="submit" value="ДОБАВИТЬ" class="add-cat">					
				</div>
			</div>

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

@endsection