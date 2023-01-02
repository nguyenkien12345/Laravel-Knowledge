<?php

// Đây là nơi mà ta khai báo các static method

namespace App\Menu;
use Illuminate\Support\Facades\Facade;

class MenuManager
{
    private $item = [];

    public function add($string, $route){
        array_push($this->items, ['label' => $string, 'route' => $route]);
    }

    public function get(){
        return $this->item;
    }
}
