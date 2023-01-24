<?php

namespace App\Helpers;

use Auth;
use Cache;

// - Khi mà chúng ta tạo ra 1 class thì chúng ta phải thêm vào cái namespace tương ứng với vị trí của cái file đó.
// - Tên class phải trùng với tên file (Tên file đang là Helpers thì tên class cũng bắt buộc phải là Helpers)
// - Nhớ vào config/app.php kéo xuống dưới cùng phần aliases (Tên định danh) và khai báo nó vô
// - Nếu không khai báo Helper vào trong app\Providers\AppServiceProvider (Khai báo để nạp vào hệ thống)
//  trong hàm register thì bắt buộc phải khai báo trong autoload của composer.json

class Helpers{
    // Lưu ý các hàm phải được khai báo ở dạng static
    public static function ntkmttt(){
        dd('Nguyễn Trung Kiên và Mai Thị Thanh Thúy');
    }

    public static function check_user_is_online($user_id){
        if(Cache::has('user-is-online-' . $user_id)) {
            return 'user-online';
        }
        else {
            return 'user-offline';
        }
    }
}
