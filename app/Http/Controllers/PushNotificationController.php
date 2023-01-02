<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class PushNotificationController extends Controller
{
    public function index(){
        return view('pushnotificationdemo.index');
    }

    public function updateDeviceToken(Request $request)
    {
        Auth::user()->device_token =  $request->token;
        Auth::user()->save();
        return response()->json(['Token stored successfully']);
    }

    public function sendNotification(Request $request){
        $url = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = 'AAAAiUiRz9w:APA91bFnSgY8V8KWp5DxWKKqOaZscmNrbka4Ce1zwKBHrxCfxpXIoXXjQCdytUPcTlgwnytO1AgJBtgX9y3MNu0YedxUCREeBAIQtcx5pW5fpBrZhJCK-aVXyJRzAnVOUeYTsSI6mNzh';

        // pluck(): dùng để lấy toàn bộ một field nào đó và trả về mảng chứa giá trị của tất cả các field đó
        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization: key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response
        dd($result);
    }
}
