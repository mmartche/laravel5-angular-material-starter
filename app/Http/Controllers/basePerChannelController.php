<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\basePerChannel;
use App\Channel;
use App\Http\Requests;

class basePerChannelController extends Controller
{
    public function get() {
        $bases = basePerChannel::get();
        return response()->success(['basePerChannel' => $bases]);
    }

    public function colect(Request $request) {
        $base_id = $request->base_id;
        $basePerChannel = basePerChannel::leftJoin('channels','channels.id','=','basePerChannel_channel_id')->where('basePerChannel_base_id',(int)$base_id)->get();
        if(!$basePerChannel){
            return $this->error("The base with {$base_id} doesn't exist", 404);
        }
        // $topic = $base->name;
        // return $this->success($topic, 200);
        return response()->success(['basePerChannel' => $basePerChannel]);
    }

    public function colectNotMyBase(Request $request) {
        $base_id = $request->base_id;
        //pensar melhor
        // $basePerChannel = Channel::leftJoin('base_per_channels','id','=','base_per_channels.basePerChannel_channel_id')->whereNotIn('basePerChannel_base_id',[0,(int)$base_id])->get();
        $basePerChannel = Channel::leftJoin('base_per_channels','id','=','base_per_channels.basePerChannel_channel_id')->whereNotIn('basePerChannel_base_id',[0,(int)$base_id])->get();
        if(!$basePerChannel){
            return $this->error("The base with {$base_id} doesn't exist", 404);
        }
        // $topic = $base->name;
        // return $this->success($topic, 200);
        return response()->success(['basePerChannel' => $basePerChannel]);
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
        $base->basePerChannel_base_id = $request->input('base_id');
        $base->basePerChannel_channel_id = $request->input('channel_id');
        $base->save();

        return response()->success(compact('basePerChannel'));
    }
}
