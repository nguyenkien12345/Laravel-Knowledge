<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index(){
        $data = Employee::select('employee_id', 'created_at', 'updated_at')->get()->groupBy(function($data){
            // m: Là lấy ra số, M là lấy ra chữ.
            // Lúc này Key của object sẽ là  M, còn Value của Object sẽ là employee_id, created_at, updated_at
            return Carbon::parse($data->created_at)->format('M');
        });

        // Lấy ra các tháng có trong bảng Employee
        $months = [];
        // 1 tháng có bao nhiều người đăng ký mới trong bảng Employee
        $monthCount = [];

        foreach($data as $month => $value){
            $months[] = $month;
            $monthCount[] = count($value);
        }

        // dd($months);
        // dd($monthCount);

        $data['months'] = $months;
        $data['monthCount'] = $monthCount;

        return \view('chart.index', $data);
    }
}
