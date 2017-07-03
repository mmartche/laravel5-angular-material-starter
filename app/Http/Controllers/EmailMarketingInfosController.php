<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailMarketing;
use App\EmailMarketingInfos;
use App\Http\Requests;

class EmailMarketingInfosController extends Controller
{
	public function getAll() {
        $bases = EmailMarketingInfos::get();
        return response()->success(['EmailMarketingInfos' => $bases]);
    }
    public function get() {
        $bases = EmailMarketingInfos::orderBy('id', 'desc')->limit(100)->get();
        return response()->success(['EmailMarketingInfos' => $bases]);
    }
    public function myInfos(Request $request) {
        $email_marketing_id = $request->email_marketing_id;
        $email_marketing_email = $request->email_marketing_email;
        $EmailMarketingInfos = EmailMarketing::leftJoin('email_marketing_infos','email_marketing_infos.email_marketing_id','=','id')->where('id',(int)$email_marketing_id)->get();
        if(!$EmailMarketingInfos){
            return $this->error("The Client with {$email_marketing_id} doesn't exist", 404);
        }
        // $topic = $base->name;
        // return $this->success($topic, 200);
        return response()->success(['EmailMarketingInfos' => $EmailMarketingInfos]);
    }

    public function save(Request $request) {
    	$this->validate($request, [
    		'email' => 'required|string',
            'base_id' => 'required|string',
    	]);
        if (!empty($request->input('email'))) {
            $EmailMarketingInfosSaveSearch = EmailMarketing::where('email',$request->input('email'))->distinct()->get();
            if (empty($EmailMarketingInfosSaveSearch[0])) {
                $email_marketing_id = EmailMarketing::insertGetId([
                    'email' => $request->input('email')
                ]);
                $EmailMarketingInfosSave = new EmailMarketingInfos;
            } else {
                $email_marketing_id = $EmailMarketingInfosSaveSearch[0]['id'];
                $EmailMarketingInfosClientSearch = EmailMarketingInfos::where([
                    ['email_marketing_id', '=', $email_marketing_id],
                    ['base_id', '=', $request->input('base_id')],
                ])->get();
                if (!empty($EmailMarketingInfosClientSearch[0]['id'])) {
                    $EmailMarketingInfosSave = EmailMarketingInfos::find($EmailMarketingInfosClientSearch[0]['id']);
                } else {
                    $EmailMarketingInfosSave = new EmailMarketingInfos;
                }
            }
        }
        $EmailMarketingInfosSave->optin = '1';
        $EmailMarketingInfosSave->email_marketing_id = $email_marketing_id;
        $EmailMarketingInfosSave->base_id = $request->input('base_id');
        $EmailMarketingInfosSave->engagement = !empty($EmailMarketingInfosClientSearch[0]['engagement']) ? $EmailMarketingInfosClientSearch[0]['engagement'] + 1 : 1;
        $EmailMarketingInfosSave->save();
        return response()->success(compact('EmailMarketingInfos'));
    }
}
