<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class LocationController extends Controller
{
    public function index(){
        // USA IP ADDRESS (66.102.0.0)
        $userIP = '66.102.0.0';

        $location = Location::get($userIP);

        $data['location'] =  $location;

        return view('location.location', $data);
    }
}
