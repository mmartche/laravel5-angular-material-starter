<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\basePerChannel;
use App\Http\Requests;

class basePerChannel extends Controller
{
    public function get() {
        $bases = basePerChannel::get();
        return response()->success(['bases' => $bases]);
    }

    public function colect(Request $request) {
        $base_id = $request->base_id;
        $base = basePerChannel::where('base_id',(int)$base_id)->get();
        if(!$base){
            return $this->error("The base with {$base_id} doesn't exist", 404);
        }
        // $topic = $base->name;
        // return $this->success($topic, 200);
        return response()->success(['bases' => $base]);
    }

    public function save(Request $request) {
    	$this->validate($request, [
            'base_id' => 'required|string',
    		'channel_id' => 'required|string',
    	]);
        if (!empty($request->input('id'))) {
            $base = basePerChannel::find($request->input('id'));
        } else {
            $base = new basePerChannel;
        }
        $base->base_id = $request->input('base_id');
        $base->channel_id = $request->input('channel_id');
        $base->base_id_user = $request->input('base_id_use');
        $base->save();

        return response()->success(compact('bases'));
    }
}
