<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;
use Session;

class SocialAuthController extends Controller
{
    public function index(){
		 if(Session::get('name')){
			 return redirect()->to('/home');
		 }
		 
		return \View::make('welcome');
	}
	public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

   public function callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
		Session::put('id',  $user->id);
		Session::put('name', $user->name);
		Session::put('email', $user->email);
		
		

        auth()->login($user);

        return redirect()->to('/home');
    }
}