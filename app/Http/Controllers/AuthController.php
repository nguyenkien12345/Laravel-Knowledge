<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function showFormRegister(){
        return view('authentication.register');
    }

    public function register(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'name' => 'name is required',
            'email' => 'email is required',
            'password' => 'password is required',
        ];

        $request->validate($rules, $messages);

        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();

        return redirect()->route('show-form-register')->with('success', 'Đăng ký thành công');
    }

    public function showFormLogin(){
        return view('authentication.login');
    }

    public function login(Request $request){
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'email' => 'email is required',
            'password' => 'password is required',
        ];

        $request->validate($rules, $messages);

        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            // Nếu đăng nhập thành công nó sẽ lưu thông tin session người dùng cho chúng ta luôn (user)
            return redirect()->route('show-profile');
        }

        return redirect()->route('show-form-login')->with('error', 'Email hoặc password không hợp lệ');
    }

    public function showProfile(){
        return view('authentication.profile');
    }

    public function updateProfile(Request $request){
        $rules = [
            'name' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'name' => 'name is required',
            'password' => 'password is required',
        ];

        $request->validate($rules, $messages);

        $user = User::find(auth()->user()->user_id);

        $user->name = $request->name;
        if($request->change_password == 'on'){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('update-profile')->with('success', 'Cập nhật thành công');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('show-form-login');
    }

    public function getBoyView(){
        return view('demo.boy');
    }

    public function getGirlView(){
        return view('demo.girl');
    }

    public function getAllUser(){
        $users = User::all();

        $data['users'] = $users;

        return view('checkUserIsOnline.index', $data);
    }
}
