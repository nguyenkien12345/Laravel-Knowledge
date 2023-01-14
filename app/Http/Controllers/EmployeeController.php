<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        return view('multistep.index');
    }

    public function postMultistep(Request $request){
        Employee::create($request->all());
        return back();
    }
}
