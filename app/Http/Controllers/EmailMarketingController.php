<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailMarketing;
use App\Http\Requests;

class EmailMarketingController extends Controller
{
	public function getAll() {
        $bases = EmailMarketing::get();
        return response()->success(['EmailMarketing' => $bases]);
    }
    public function get() {
        $bases = EmailMarketing::orderBy('id', 'desc')->limit(100)->get();
        return response()->success(['EmailMarketings' => $bases]);
    }
    public function lastest() {
        $bases = EmailMarketing::lastest()->limit(100)->get();
        return response()->success(['EmailMarketings' => $bases]);
    }

    public function myInfos(Request $request) {
        $email_marketing_id = $request->email_marketing_id;
        $email_marketing_email = $request->email_marketing_email;
        $EmailMarketing = EmailMarketing::leftJoin('email_marketing_infos','email_marketing_infos.email_marketing_id','=','id')->where('id',(int)$email_marketing_id)->get();
        if(!$EmailMarketing){
            return $this->error("The Client with {$email_marketing_id} doesn't exist", 404);
        }
        // $topic = $base->name;
        // return $this->success($topic, 200);
        return response()->success(['EmailMarketing' => $EmailMarketing]);
    }

    public function save(Request $request) {
    	$this->validate($request, [
    		'email' => 'required|string',
    	]);
        if (!empty($request->input('email'))) {
            $EmailMarketingSaveSearch = EmailMarketing::where('email',$request->input('email'))->get();
            $EmailMarketingSave = EmailMarketing::find($EmailMarketingSaveSearch[0]['id']);
            if (empty($EmailMarketingSave)) {
	            $EmailMarketingSave = new EmailMarketing;
            }
        } else {
            $EmailMarketingSave = new EmailMarketing;
        }
        $EmailMarketingSave->email = $request->input('email');
        $EmailMarketingSave->name = $request->input('name');
        $EmailMarketingSave->last_name = $request->input('last_name');
        $EmailMarketingSave->birthday = $request->input('birthday');
        $EmailMarketingSave->document_number = $request->input('document_number');
        // die(var_dump($EmailMarketingSave));
        $EmailMarketingSave->save();

        return response()->success(compact('EmailMarketing'));
    }
}
