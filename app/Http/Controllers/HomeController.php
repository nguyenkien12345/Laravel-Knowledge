<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment_Authorization;
use Illuminate\Support\Facades\Gate;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function logInfo()
    {
        $information = 'Id: ' . Auth::user()->user_id. ' - '. 'Name:  '.Auth::user()->name. ' - '. 'Email:  '.Auth::user()->email;
        echo $information;
    }

    public function editComment($comment_id){
        $comment = Comment_Authorization::find($comment_id);

        // DÙNG GATE
        // Do chúng ta đã login vào hệ thống nên mặc định là đã có $user => Không cần truyền $user
        // CÁCH 1 Dùng allows
        // if(Gate::allows('edit-comment', $comment)){
        //     return "Bạn có quyền";
        // }
        // else{
        //     return "Bạn không có quyền";
        // }

        // CÁCH 2 Dùng denies
        // if(Gate::denies('edit-comment', $comment)){
        //     return "Bạn không có quyền";
        // }
        // else{
        //     return "Bạn có quyền";
        // }

        // DÙNG POLICY
        // $user = auth()->user();
        // Tương đương với Gate::allows
        // Gọi đến phương thức update trong policy CommentPolicy của model Comment_Authorization
        // if($user->can('update', $comment)){
        //     return 'Bạn có quyền';
        // }
        // else{
        //     return 'Bạn không có quyền';
        // }

        // Tương đương với Gate::denies
        // Gọi đến phương thức update trong policy CommentPolicy của model Comment_Authorization
        // if($user->cant('update', $comment)){
        //     return 'Bạn có quyền';
        // }
        // else{
        //     return 'Bạn không có quyền';
        // }

        // Lưu ý đặc biệt
        // Khi gọi policy của phương thức create thì ta phải khai báo kèm cả model đó ra luôn
        // Gọi đến phương thức create trong policy CommentPolicy của model Comment_Authorization
        // if($user->can('create', Comment_Authorization::class)){
        //     return 'Bạn có quyền';
        // }
        // else{
        //     return 'Bạn không có quyền';
        // }

        // Ngoài cách dùng $user->can ta có thể sử dụng $this->authorize
        if($this->authorize('update', $comment)){
            return 'Bạn có quyền';
        }
        else{
            return 'Bạn không có quyền';
        }
    }
}
