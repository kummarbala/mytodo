<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
    //
	public function index(){
		 if(Session::get('name')){
			 return redirect()->to('/home');
		 }
		return \View::make('welcome');
	}
	public function home(){
		$name = Session::get('name');
		return \View::make('home')
		->with('name', $name);
		
	}
}
