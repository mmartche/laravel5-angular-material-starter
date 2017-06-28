<?php

namespace App\Http\Controllers;

use App\Base;
// use App\basePerChannel;
// use App\Channels;
use App\Http\Requests;
use Illuminate\Http\Request;

class BasesController extends Controller
{
    public function get() {
        $bases = Base::get();
        return response()->success(['bases' => $bases]);
    }

    public function colect(Request $request) {
        $base_id = $request->base_id;
        $base = Base::leftJoin('base_per_channels','base_per_channels.basePerChannel_base_id','=','bases.id')->leftJoin('channels','channels.id','=','base_per_channels.basePerChannel_channel_id')->where('bases.id',(int)$base_id)->get();
        if(!$base){
            return $this->error("The base with {$base_id} doesn't exist", 404);
        }
        // $topic = $base->name;
        // return $this->success($topic, 200);
        return response()->success(['bases' => $base]);
    }
    
    public function save(Request $request) {
    	$this->validate($request, [
            'base_name' => 'required|string',
    		'base_content' => 'required|string',
    	]);
        if (!empty($request->input('id'))) {
            $base = Base::find($request->input('id'));
        } else {
            $base = new Base;
        }
        $base->base_name = $request->input('base_name');
        $base->base_sender = $request->input('base_sender');
        $base->base_content = $request->input('base_content');
        $base->base_periodicity = $request->input('base_periodicity');
        $base->base_nameExternalKey = $request->input('base_nameExternalKey');
        $base->base_nameBase = $request->input('base_nameBase');
        $base->base_nameSubBase = $request->input('base_nameSubBase');
        $base->base_nameOrigin = $request->input('base_nameOrigin');
        $base->base_status = $request->input('base_status');
        $base->base_country = $request->input('base_country');
        $base->base_id_user = $request->input('base_id_use');
        $base->save();

        return response()->success(compact('bases'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'base_id' => 'required|integer',
            'base_name' => 'required|string',
        ]);
        
        $base = Base::find($request->input('id'));
        $base->base_name = $request->input('base_name');
        $base->base_sender = $request->input('base_sender');
        $base->base_content = $request->input('base_content');
        $base->base_periodicity = $request->input('base_periodicity');
        $base->base_nameExternalKey = $request->input('base_nameExternalKey');
        $base->base_nameBase = $request->input('base_nameBase');
        $base->base_nameSubBase = $request->input('base_nameSubBase');
        $base->base_nameOrigin = $request->input('base_nameOrigin');
        $base->base_status = $request->input('base_status');
        $base->base_country = $request->input('base_country');
        $base->base_id_user = $request->input('base_id_use');
        $base->save();
        return response()->success(compact('bases'));
    }

}
