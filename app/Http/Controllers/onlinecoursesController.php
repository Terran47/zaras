<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MkOnlineCouses;
use App\Models\Category;
use App\Models\purchasedCourse;
use Carbon\Carbon;
use Auth;

class onlinecoursesController extends Controller
{

	public function pastrylaboratory(){

		$shefs = Category::where('category_cat_id','=',4)->get();

 		return view('pastryLaboratory',['shefs'=>$shefs]);
 	}

    public function onlinecourses($id){

    	$shefInfos = Category::where('id','=',$id)->first();

    	$purchasedCourses = purchasedCourse::where('purchased_courses_shef_id','=',$id)->get();

    	$MkOnlineCouses = MkOnlineCouses::where('mk_onlines_shef_id','=',$id)->get();

    	$categoryFilters = Category::where('category_cat_id','=',1)->get();

    	return view('onlineCourses', [
    		'MkOnlineCouses' => $MkOnlineCouses, 
    		'shefInfos' => $shefInfos,
    		'purchasedCourses'=>$purchasedCourses,
    		'categoryFilters' => $categoryFilters,
    		'shef_id'=>$id
    	]);
    }

    public function onlinevideo(Request $request){
    	$onlineCouseID = $request->input('videoCourseID');

    	$purchasedCouse = purchasedCourse::where('purchased_courses_course_id','=',$onlineCouseID)->first();
    	echo $purchasedCouse;
    }

   public function onlinecursesajax(Request $request){

   		$filter_id = $request->input('filterID');
		$shef_id = $request->input('shefID');
   		$contentOnlineCourses = [];

	   	if($filter_id >0){
			$mainCatFilters = MkOnlineCouses::where([['mk_onlines_cat_id','=',$filter_id],['mk_onlines_shef_id','=',$shef_id],['mk_onlines_language_id','=',1]])->get();   			
   		}else{
   			$mainCatFilters = MkOnlineCouses::where([['mk_onlines_shef_id','=',$shef_id],['mk_onlines_language_id','=',1]])->get();
   		}
	
		$purchasedCourses = purchasedCourse::where('purchased_courses_shef_id','=',$shef_id)->get();

		
		$detail = '<button class="bay">Подробно</button>';
		
		foreach ($mainCatFilters as $mainCatFilter){
			$price = 0;
			if($mainCatFilter->mk_onlines_price === 0){
	            $price = 'Бесплатно!';
	        }else{
				$price = $mainCatFilter->mk_onlines_price.'тг';
	        }
            $gost = "";
            $rezultPubCours = "";

            if(Auth::guest()){

            	if($mainCatFilter->mk_onlines_price === 0){
					$gost = '<button class="looking" data-video-id="'.$mainCatFilter->id.'">Смотреть</button>';
				}else{
					$gost = $detail;
				}
				$rezultPubCours = $gost;
            }else{

            	$pubCours = "";
            	
	            foreach($purchasedCourses as $purchasedCourse){

	                if(count($purchasedCourses) > 0 && $mainCatFilter->mk_onlines_price === 0 || Auth::user()->id == $purchasedCourse->purchased_courses_user_id){

		                if($mainCatFilter->id === $purchasedCourse->purchased_courses_course_id){
			                $pubCours = '<button class="looking" data-video-id="'.$mainCatFilter->id.'">Смотреть</button>';
		                }

						$rezultPubCours = $pubCours;

					}else{

						if($mainCatFilter->mk_onlines_price === 0){

							$pubCours = '<button class="looking" data-video-id="'.$mainCatFilter->id.'">Смотреть</button>';

						}else{

							$pubCours = $detail;
						}
						$rezultPubCours = $pubCours;					
					}					                    
	            }	
			}

			if($rezultPubCours == ''){ 
				$rezultPubCours = $detail;
			}       

			$contentOnlineCourses[] = '
			<div class="load-block-main"><i class="fa fa-cog" aria-hidden="true"></i></div>
			<div class="col-lg-3 col-md-3">'.
                '<div class="online-mr-course" data-shef-id="'.$mainCatFilter->mk_onlines_shef_id.'">'.
                    '<div class="online-mr-course-img">'.
                        '<img src="'.$mainCatFilter->mk_onlines_img.'" alt="">
                        <div class="online-mr-course-hover"><i class="fa " aria-hidden="true"></i></div>
                    </div>
                    <p style="font-size: 18px;font-weight: bold;">'.$mainCatFilter->mk_onlines_title.'</p>
                    <p style="text-align: left; margin-left:10px;">Сложность: <span style="color:#E6617B;">
                    	'.$mainCatFilter->mk_onlines_slojnost.'</span></p>
                    <p style="text-align: left; padding:0 10px">
                    	'. mb_substr($mainCatFilter->mk_onlines_description, 0, 70, 'UTF-8') . '...'.'</p>
                    <p style="color:red; font-size: 18px; font-weight: bold;">'.$price.'</p>'.$rezultPubCours.'                    
                </div> 
			</div>';	
		}

		return $contentOnlineCourses;
   }

   public function mainvideo(){

   		$user_id = Auth::user()->id;

   		$mainVideos = purchasedCourse::where('purchased_courses_user_id','=',$user_id)->get();

   		return view('cabinet.mainvideo',['mainVideos'=>$mainVideos, 'time'=>Carbon::now()->addDay(3)]);
   		

   }

}
