<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class SettingController extends Controller
{
    public function index(){
        // Nếu value của tham số thứ 1 không tồn tại thì sẽ lấy giá trị mặc định là value của tham số thứ 2

        // ÁP DỤNG CHO FILE CONFIG
        $language_vi = \config('common_language.all_languages.vi', 'Ngôn ngữ Việt Nam');
        $country_vi = \config('common_language.all_countries.VN', 'Quốc gia Việt Nam');
        // dd('language_vi: ' . $language_vi . ' - ' . 'country_vi: ' . $country_vi);

        // ÁP DỤNG CHO FILE ENV
        $mail_from_address = env('MAIL_FROM_ADDRESS', 'nguyentrungkien08112000@gmail.com');
        $mail_from_name = env('MAIL_FROM_NAME', 'nguyentrungkien08112000@gmail.com');
        dd('MAIL_FROM_ADDRESS: ' . $mail_from_address . ' - ' . 'MAIL_FROM_NAME: ' . $mail_from_name);
    }
}
