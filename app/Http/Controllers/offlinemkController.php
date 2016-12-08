<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mk_offlines_courses;
use App\Models\Category;

class offlinemkController extends Controller
{


 	public function raspisaniemr(){

 		$CategorysMonths = Category::where([['category_status','=',1],['category_cat_id','=',2]])->get();

 		return view('raspisaniemr', ['CategorysMonths'=>$CategorysMonths]);
 	}

 	public function offlinecursesajax(Request $request){

 		$CategorysCitys = Category::where([['category_status','=',1],['category_cat_id','=',2]])->get();

 		$month_id = $request->input('id');

 		if($month_id == 0){
 			$mainSelectCourses = Mk_offlines_courses::all();
 		}else{
 			$mainSelectCourses = Mk_offlines_courses::where([['cat_masters_month','=',$month_id],['cat_masters_language_id','=',1]])->get();	
 		}

 		$contentCourses = [];

 		foreach($mainSelectCourses as $mainSelectCours){

 			$place = '';
			if($mainSelectCours->cat_masters_place_status == false){
				$place = 'Подробнее';
			}else { 
				$place ='мест нет';
			}

 			$contentCourses[] = '<div class="col-lg-6 col-md-6">'.
				'<div class="pas-mr-table-block">'.
					'<div class="col-lg-12"><div class="row">'.
							'<div class="col-lg-3 col-md-3"><div class="row">'.
								'<div class="main-img-cours" style="background:url('.$mainSelectCours->cat_masters_img.') center;background-size:cover;"></div>'.
							'</div></div>'.
							'<div class="col-lg-6 col-md-6">'.
								'<p>'.$mainSelectCours->cat_masters_title_cours.'</p>'.
								'<p>'.$mainSelectCours->cat_masters_date.'</p>'.
								'<p>'.$mainSelectCours->cat_masters_city.'</p>'.
							'</div>'.
							'<div class="col-lg-3 col-md-3"><div class="row">'.
								'<div class="pas-mr-price">'.
									'<p>'.$mainSelectCours->cat_masters_price.' тг</p>'.							
								'</div>'.	
							'</div></div>'.
						'</div></div>'.						
						'<div class="pas-mr-info-hover">'.
							'<button data-course-ajax-id="'.$mainSelectCours->id.'">'.$place.' <i class="fa fa-expand" aria-hidden="true"></i></button>'.
						'</div>'.
					'</div>'.						
				'</div>';
 		}

 		return $contentCourses;
 	}

 	public function offlinepopup(Request $request){

 		$id = $request->input('id');


 		$mainSelectCourses = Mk_offlines_courses::where([['id','=',$id],['cat_masters_language_id','=',1]])->first();

 		$maincontent = [];

 		 $place = '';

		if($mainSelectCourses->cat_masters_place_status == false){
			$place = '<input style="padding:5px 10px; background:#E94F6D;color:#fff; border:none; margin-top:10px;" value="Записаться" type="submit" class="main-button-zapis" data-course-zapis-id="'.$mainSelectCourses->id.'"><script>'.
 			'$(document).off("click", "input.main-button-zapis").on("click", "input.main-button-zapis", function(){'.
 			'$(document).find(".zapis-offline-block").css("visibility","visible");'.
 			'});'.
 			'</script>';
		}else { 
			$place ='<p style="color:red;font-size:18px; ">Мест нет</p>';
		}

 		$maincontent[] = '
 		<div class="zapis-offline-block">
 			<div class="zapis-offline">
				<h3>Форма обратной связи:</h3>
				<label>Имя, фамилия*</label>
				<input type="text" placeholder="Виктория, Прыгунова">
				<label>Телефон*</label>
				<input type="text" placeholder="+7 701 999 99 99">
				<label>Е-mail*</label>
				<input type="text" placeholder="vika@example.ru">
				<button>Отправить</button>
				<i class="fa fa-times-circle-o" aria-hidden="true"></i>	
			</div>
		</div>'.'
		<div class="mk-table-popup-bg"><div class="col-lg-12 mk-table-popup-content"><div class="row"><div class="col-lg-6"><img src="'.$mainSelectCourses->cat_masters_img.'" alt=""></div><div class="col-lg-6"><h2>'.$mainSelectCourses->cat_masters_title_cours.'</h2><p>'.$mainSelectCourses->cat_masters_description_cours.'</p>'.$mainSelectCourses->cat_masters_price.' тенге.<br>'.$place.'</div></div></div><div class="popup-top-line"></div><i class="fa fa-times-circle-o" aria-hidden="true"></i></div>';

 		return $maincontent;

 	}

}