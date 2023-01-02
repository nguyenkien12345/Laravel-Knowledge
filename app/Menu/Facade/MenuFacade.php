<?php

// Đây là cái Facade mà chúng ta sẽ sử dụng

namespace App\Menu\Facade;
use Illuminate\Support\Facades\Facade;

class MenuFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return 'menu';
    }
}

// Chúng ta phải khai báo hàm getFacadeAccessor vì trong Facade mà chúng ta đang kế thừa lại cũng có cái hàm getFacadeAccessor mà cái hàm này
// lại đang trả về 1 cái thông báo lỗi nên chúng ta bắt buộc phải override cái hàm này
