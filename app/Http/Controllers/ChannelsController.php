<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Http\Requests;

class ChannelsController extends Controller
{
	public function get() {
        $channels = Channel::get();
        return response()->success(['channels' => $channels]);
    }

    public function colectMyData(Request $request) {
        $base_id = $request->base_id;
        $channel = Channel::where('id',(int)$base_id)->get();
        if(!$channel){
            return $this->error("The channel with {$base_id} doesn't exist", 404);
        }
        // $topic = $channel->name;
        // return $this->success($topic, 200);
        return response()->success(['channels' => $channel]);
    }
}
