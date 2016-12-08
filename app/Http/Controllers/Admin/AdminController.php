<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Category;

class AdminController extends Controller
{	
    public function admin(){
    	return view('admin.index');
    }

    public function userstable(){

    	$users = User::all();
    	return view('admin.users', ['users' => $users]);
    }

    public function onlinecours(){

    	$shefs = Category::where('category_cat_id','=',4)->get();
    	return view('admin.onlinecours', ['shefs'=>$shefs]);
    }



}
