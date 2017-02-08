<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Todo;
use Socialite;
use Session;

class TodoController extends Controller
{
    //
	public function home(){
		$name =  Session::get('name');
		return \View::make('home')
		->with('name', $name);
		
	}
	public function get(){
		$todolist = Todo::all();
		return response()->json($todolist);
		exit;
		
	}
	public function insert(Request $request){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$title = $request->title;
		$saverequest = array('title' =>$title,
							'completed' =>'0');
		
		Todo::create($saverequest);
		$todolist = Todo::all();
		return response()->json($todolist);
		exit;
		
	}
	public function docomplete(){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$id = $request->id;
		$update = Todo::find($id);
		if($update->completed == 0){
			$update->completed = 1;
		}else{
			$update->completed = 0;
		}
		$update->save();
		$todolist = Todo::all();
		return response()->json($todolist);
		exit;
		
		
		
	}
	
	public function dodelete(){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$id = $request->id;
		$delete = Todo::find($id); 
		$delete->delete();
		$todolist = Todo::all();
		return response()->json($todolist);
		exit;
		
	}
	
	public function todosactive(){
		$todolist = Todo::where('completed','0')->get();
		return response()->json($todolist);
		exit;
	}
	
	public function todoscompleted(){
		$todolist = Todo::where('completed','1')->get();
		return response()->json($todolist);
		exit;
	}
}
