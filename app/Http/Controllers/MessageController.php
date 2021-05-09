<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(Request $request){
    	
    	$phoneno=$request->all();
     	$phoneno=$phoneno['phoneno'];
    //	dd($phoneno);
    	$mobileNumber=implode(',',$phoneno);
    	//print_r($mobileNumber);
    	//$authkey='';
    	//$senderId=22136;
    //	$route=4;
        //sms
			
			
			$recipients=$mobileNumber;
			//Set SMS recipients and content
			$data = array(
				'api_key' => "608f9493a7a76",
			    'message' => 'Hotdot Cyber Sms Test',
			    'username'=>'hotdot',
			    'sender_id' => 22136,
			    'phone' => 254727348891,

			    //'route'=>$route,
			);
			$url = "http://bulksms.mobitechtechnologies.com/api/sendsms";
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			print($result);
			$json = json_decode($result);
			print_r($data['sender_id']);
        //end


    	//echo $phoneno;
    }
}
