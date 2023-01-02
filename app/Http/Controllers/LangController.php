<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class LangController extends Controller
{
    public function changeLanguage($locale){
        // Cập nhật lại ngôn ngữ hiển thị bằng cách lưu session
        Session::put('language', $locale);
        return redirect()->back();
    }

    public function testLanguage(){
        // Để hiển thị ra đa ngôn ngữ từ folder lang: tên file.tên key.
        // echo __('messages.welcome', [
        //     'username' => 'Nguyễn Trung Kiên',
        //     'websitename' => 'NashTech'
        // ]);
        // echo "<br>";

        // echo('----- FRUIT -----');
        // echo "<br>";
        // echo __('messages.fruit.avocado');
        // echo "<br>";
        // echo __('messages.fruit.apple');
        // echo "<br>";
        // echo __('messages.fruit.banana');
        // echo "<br>";
        // echo __('messages.fruit.orange');
        // echo "<br>";
        // echo __('messages.fruit.grape');
        // echo "<br>";

        // echo('----- ANIMAL -----');
        // echo "<br>";
        // echo __('messages.animal.cat');
        // echo "<br>";
        // echo __('messages.animal.camel');
        // echo "<br>";
        // echo __('messages.animal.dog');
        // echo "<br>";
        // echo __('messages.animal.fox');
        // echo "<br>";
        // echo __('messages.animal.lion');
        // echo "<br>";
        return view('demo.lang');
    }
}
