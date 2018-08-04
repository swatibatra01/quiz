<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quiz_data;
use App\level_one;
use App\level_two;
use App\level_three;
class quiz_controller extends Controller
{
    public function quiz_getdata()
    {
    	$data = quiz_data::inRandomOrder()->latest()->get();
    	 return response()
    	        ->json($data);
    }

    public function quiz_send_data(Request $request)
    {
        /*$id1 = $request->id1;
        $id2 = $request->id2;
        $id3 = $request->id3;*/

        $level_one = level_one::where('name',$request->id1)->get()->first();
        $id1 = $level_one->id;

        $level_two =level_two::where(['name'=>$request->id2,'level_one_id'=>$id1])->get()->first();
        $id2 = $level_two->id;

        $level_three =level_three::where(['name'=>$request->id3,'level_one_id'=>$id1,'level_two_id'=>$id2])->get()->first();
        $id3 = $level_three->id;






    	$options = json_encode([
    		                    'options' => $request->options ,
    		                     'correct' =>intval($request->correct)
    		                    ]);
    	quiz_data::create(['title'=>$request->title,
    		               'options'=>$options,
    		               'level_one_id' => $id1,
    		               'level_two_id' => $id2,
    		               'level_three_id' => $id3,
                          ]);
    	return response()
    	        ->json("question submited");
    }

    public function main_category(Request $request)
    { 	
    	level_one::create(['name'=>$request->name]);

    	$main = level_one::all();
    	return response()
    	        ->json($main);
    }

    public function main_display()
    {
    	$main = level_one::all();

    	return response()
    	        ->json($main);
    }

  public function sub_category(Request $request)
    {    
    	/*if($request->main == ''){
    		return response()
    	        ->json("Main category cannot be empty");
    	}*/

    	$id = level_one::where('name', $request->main)->get()->first();
    	level_two::create(['name'=>$request->name,
    	               'level_one_id'=>$id->id
    		           ]);

    	$sub = level_two::all();
    	return response()
    	        ->json($sub);
    }

    public function sub_display()
    {
    	$sub = level_two::all();

    	return response()
    	        ->json($sub);
    }

   public function ss_category(Request $request)
    {
    	$name = $request->name;
    	$parent = $request->parent;
    	$s_parent = $request->s_parent;

    if($request->parent == '' or $request->s_parent == ''){
   return response()
    	    ->json("Main or Sub-category cannot be empty");
    	}

    	$id_parent = level_two::where('name', $request->s_parent)->get()->first();

    	
    		$parent_id = $id_parent->level_one_id;
    	
         
        level_three::create(['name'=>$name,
    	               'level_one_id'=>$parent_id,
    	               'level_two_id'=>$id_parent->id
    		           ]);
        
        return response()
    	        ->json("ss category submited");

    }
}
