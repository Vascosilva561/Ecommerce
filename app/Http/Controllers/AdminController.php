<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Imagens;
use Cache;
use App\Category;
//use App\Admin;

class AdminController extends Controller
{
   public function __construct(){
   	//$this->middleware('auth');
   }

   public function index(){
      $total_counts = Order::count();
	return view('admin.index')->with([
            'total_counts' => $total_counts,
        ]);;
	}

   public function login(){
   	return view('auth.login-admin');
   }


   public function postLogin(Request $request)
   {
   	$validator = validator($request->all(), [
   		'email' => 'required|min:3|max:50',
   		'password' => 'required|min:6|max:50',
   		]);


   		if ( $validator->fails() ) {
   			return redirect('/admin/login')
   				->withErrors($validator)
   				->withInput();
   		}
   		$credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
   		//dd($credentials);
   		if( auth()->guard('admin')->attempt($credentials)){
   			return redirect('/admin/londing');
   		}else{
   			return redirect('/admin/login')
		   			->withErrors(['errors' => 'Login Invalido!'])
		   			->withInput();
   		}
   		
   }

   public function logout(){
	   	auth()->guard('admin')->logout();
	   	return redirect('/admin/login');
   }
}
