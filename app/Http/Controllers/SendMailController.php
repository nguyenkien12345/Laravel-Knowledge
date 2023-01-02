<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendMail(){
        $user = User::find(1);
        $mailable = new DemoEmail($user);
        // Send email không dùng queue
        Mail::to($user->email)
            ->cc(['liverpoolkien911@gmail.com', 'super.ad.fec.user@gmail.com'])
            ->send($mailable);

        // Send email dùng queue
        // Mail::to($user->email)->queue($mailable);
        return true;
    }

    public function getConfigEmail(){
        return view('mail.config');
    }

    public function postConfigEmail(Request $request){
        // Vào folder config -> file mail.php -> Update lại config theo ý muốn
        config([
            'mail.default' => 'smtp',
            'mail.mailers.smtp.host' => $request->mail_host,
            'mail.mailers.smtp.port' => $request->mail_port,
            'mail.mailers.smtp.username' => $request->mail_username,
            'mail.mailers.smtp.password' => $request->mail_password,
            'mail.mailers.smtp.encryption' => $request->mail_encryption,
            'mail.from.address' => $request->mail_username,
            'mail.from.name' => 'NGUYỄN TRUNG KIÊN"S SYSTEM CONFIG',
        ]);

        $user = User::find(1);
        $mailable = new DemoEmail($user);
        Mail::to($user->email)->send($mailable);
        // Không nên chạy queue ở đây vì nó sẽ không lấy config ở trên mà thay vào đó nó sẽ tách luồng ra chạy riêng
        // cho nên nó sẽ lấy config ở trong hệ thống của mình
        return redirect()->back()->with('success', 'Update Config Email Successfully');
    }
}
