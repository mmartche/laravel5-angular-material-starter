<?php

namespace App\Http\Controllers;

use App\Base;
use App\Http\Requests;
use Illuminate\Http\Request;

class BasesController extends Controller
{
    public function get() {
        $bases = Base::get();
        return response()->success(['bases' => $bases]);
    }
    public function index(Request $request) {
        $base_id = $request->base_id;
        $base = Base::where('id',(int)$base_id)->get();
        if(!$base){
            return $this->error("The base with {$base_id} doesn't exist", 404);
        }
        // $topic = $base->name;
        // return $this->success($topic, 200);
        return response()->success(['bases' => $base]);
    }
    public function create(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|string',
    		'topic' => 'required|string',
    	]);
    	$base = new Base;
    	$base->name = $request->input('name');
    	$base->topic = $request->input('topic');
    	$base->save();

    	return response()->success(compact('bases'));
    }

    public function update(Request $request, $base_id){
        $this->validate($request, [
            'name' => 'required|string',
            'topic' => 'required|string',
        ]);
        
        $base->name = $request->input('name');
        $base->topic = $request->input('topic');
        $base->base_id = $base_id;
        $base->save();
        return response()->success(compact('bases'));
    }

}
