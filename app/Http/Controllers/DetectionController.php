<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetectionController extends Controller
{
    public function index(){
        return view('detection.index');
    }
}
