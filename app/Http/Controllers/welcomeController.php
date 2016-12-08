<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otzivy;
use App\Models\Zara_sovet;
use App\Models\Foto_otchet;
use App\Models\Mk_offlines_courses;
use App\Models\Category;

class welcomeController extends Controller
{
 	public function otzivy(){

 		$otzives = Otzivy::all();

 		$zaraSovets = Zara_sovet::all();

 		return view('welcome', ['otzives'=>$otzives, 'zaraSovets'=>$zaraSovets]);
 	}

 	public function fotootchety(){
 		$fotoOtchets = Foto_otchet::paginate(11);
 		return view('fotoOtchets',['fotoOtchets'=>$fotoOtchets]);
 	}


 	public function pastrylaboratory(){
 		return view('pastryLaboratory');
 	}
}
