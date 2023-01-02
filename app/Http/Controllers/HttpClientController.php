<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Config;

class HttpClientController extends Controller
{
    // Phương thức GET thông thường
    // $response = Http::get('https://jsonplaceholder.typicode.com/posts');
    // dd($response->status());
    // dd($response->headers());
    // dd($response->body());
    // dd($response->json());
    // dd([$response->json()[0]['userId'], $response->json()[0]['id'], $response->json()[0]['title'], $response->json()[0]['body']]);
    // dd($response->object());
    // dd($response->collect());
    // dd($response->ok());
    // dd($response->successful());
    // dd($response->failed());
    // dd($response->serverError());
    // dd($response->clientError());

    // Phương thức upload ảnh
    // $response = Http::attach('image', \file_get_contents('background.png'), 'background.png')->post('https://jsonplaceholder.typicode.com/posts',
    // [
    //     'name' => 'Nguyễn Trung Kiên',
    //     'age' => 22,
    //     'email' => 'nguyentrungkien@gmail.com'
    // ]);
    // (TS1) là tên key của file (image), (TS2) là nội dung của file (background.png), (TS3) Ta đặt tên cho file để đưa lên server (background.png)
    // Ta sẽ đẩy nội dung file ảnh kèm theo các nội dung body khác lên

    // Truyền kèm header lên server
    // $response = Http::withHeaders([
    //     'authorization' => 'Bearer Token 1234567890987654321',
    //     'appKey' => 'qwertyuiop',
    //     'appId' => '1234567890'
    // ])->post('https://jsonplaceholder.typicode.com/posts');

    // Authentication
    // VD1 Với Basic Auth:
    // $response = Http::withBasicAuth('nguyentrungkien','kienliverpool123')->post('https://liverpoolfc.com');
    // VD2 Với Token:
    // $response = Http::withToken('nguyentrungkien123456789987654321')->post('https://liverpoolfc.com');

    // Sau bao nhiêu giây thì trả ra lỗi sau 1 khoảng thời gian timeout
    // try{
    //     $response = Http::timeout(3)->get('https://liverpoolfc.com');
    // }
    // catch(ConnectException $exception){

    // }

    // Retries (Thử lại api tối đa 3 lần cứ sau mỗi 1 giây)
    // $response = Http::retry('3', '1000')->post('https://liverpoolfc.com');
    public function getAllWorkers(){
        $domain = \config('domain.DOMAIN_WORKER');
        $response = Http::withHeaders([
        'appKey' => 'WOLFSOLUTIONSCALIBEEHOCHIMINH',
        'appId' => '113911LIVERPOOLFCCALIBEE'
        ])->get($domain.'/workers');
        dd($response->json());
        // dd($domain.'/workers');
    }

    public function getAllCustomers(){
        $domain = \config('domain.DOMAIN_CUSTOMER');
        $response = Http::withHeaders([
        'appKey' => 'WOLFSOLUTIONSCALIBEEHOCHIMINH',
        'appId' => '113911LIVERPOOLFCCALIBEE'
        ])->get($domain.'/customers');
        dd($response->json());
        // dd($domain.'/customers');
    }

    public function registerWorker(){
        $domain = \config('domain.DOMAIN_WORKER');
        $response = Http::withHeaders([
        'appKey' => 'WOLFSOLUTIONSCALIBEEHOCHIMINH',
        'appId' => '113911LIVERPOOLFCCALIBEE'
        ])->post($domain.'/sign-up', [
            "name" => "Ngô Nguyễn Phong My",
            "phone" => "0998877661",
            "password" => "Abc123",
            "working_area" => "79",
            "working_place" => "752,753,754,755",
            "skills" => "2,3"
        ]);
        dd($response->json());
    }

    public function registerCustomer(){
        $domain = \config('domain.DOMAIN_CUSTOMER');
        $response = Http::withHeaders([
        'appKey' => 'WOLFSOLUTIONSCALIBEEHOCHIMINH',
        'appId' => '113911LIVERPOOLFCCALIBEE'
        ])->post($domain.'/sign-up', [
            "name" => "Ngô Nguyễn Phong My",
            "email" => "ngonguyenphong@gmail.com",
            "phone" => "0998877661",
            "password" => "Abc123",
        ]);
        dd($response->json());
    }
}
