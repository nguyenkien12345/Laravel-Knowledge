<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class AddNewUSer extends Command
{
    /**
     * The name and signature of the console command.
     * {number} như là 1 tham số nếu người dùng không truyền vô giá trị thì mặc định là 1.
     * {--password} như là 1 option nếu truyền thì sẽ là true, ngược lại là false. (Trong trường hợp đã truyền option) Nếu không truyền giá trị cho password thì sẽ lấy 123456 làm giá trị mặc định
     * P chính là shortcut nghĩa là thay vì gõ vào chữ --password ta chỉ cần gõ chữ -P
     * Đối với tham số chỉ cần truyền vào value, nhưng option phải truyền đủ cả key lẫn value
     * {name*} trong đó * có nghĩa là có thể nhận vào 1 giá trị là mảng
     * Để viết mô tả cho từng tham số ta dùng dấu : đằng sau
     * Chỉ được phép tồn tại 1 tham số nhưng có thể có nhiều option
     * VD: php artisan add-new-user 5 nguyentrungkien maithithanhthuy --password=123456789
     *
     * @var string
     */
    protected $signature = 'add-new-user
                            {number=1 : Số lượng user ta muốn tạo}
                            {--N|name=* : Nhận vào 1 mảng name}
                            {--E|email=* : Nhận vào 1 mảng email}
                            {--P|password=* : Nhận vào 1 mảng password}
                            {--I|isAdmin=* : Nhận vào 1 mảng isAdmin}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add into database number of new user';

    public function handle()
    {
        // argument('key')  nhận vào 1 giá trị (tham số). Múôn lấy ra giá trị của tham số nào thì truyền key vào cặp ngoặc ()
        // arguments('key') nhận vào 1 mảng các giá trị (tham số). Múôn lấy ra giá trị của tham số nào thì truyền key vào cặp ngoặc ()
        // $this->info chỉ nhận vào string không nhận mảng
        // option() trả về 1 mảng các option hiện có do người dùng truyền lên. Múôn lấy ra giá trị của option nào thì truyền key vào cặp ngoặc ()
        // $this->ask(): Yêu cầu người dùng nhập vào option chỉ định (Hiển thị ra thông tin người dùng gõ vào)
        // $this->secret(): Yêu cầu người dùng nhập vào option chỉ định (Không hiển thị ra thông tin người dùng gõ vào) (thường dành cho các field bảo mật)
        // $this->choice(): Đưa ra các option cho người dùng lựa chọn
        $argument = $this->argument('number');

        // Cách 1: Người dùng phải truyền vào tham số và các option tương ứng (Người dùng đã biết tham số và các option của câu lệnh command này)
        // VD câu lệnh: php artisan add-new-user 2 --name=nguyentrungkien --name=maithithanhthuy --email=nguyentrungkien@gmail.com --email=maithithanhthuy@gmail.com --password=nguyentrungkien123 --password=maithithanhthuy123 --isAdmin=1 --isAdmin=0
        // $option_names = $this->option('name');
        // $option_emails = $this->option('email');
        // $option_passwords = $this->option('password');
        // $option_is_admins = $this->option('isAdmin');

        // dd([$option_names, $option_emails, $option_passwords, $option_is_admins]);

        // for($i = 0; $i < $argument; $i++){
        //     User::create([
        //         'name' => $option_names[$i],
        //         'email' => $option_emails[$i],
        //         'password' => bcrypt($option_passwords[$i]),
        //         'is_admin' => $option_is_admins[$i],
        //     ]);
        // }

        // Cách 2: Người dùng phải truyền vào tham số sau đó chương trình sẽ tự yêu cầu người dùng nhập vào các option tương ứng bằng các yêu cầu do lập trình viên thiết lập ra (Người dùng đã biết tham số nhưng chưa biết các câu lệnh option của câu lệnh command này)
        // VD câu lệnh: php artisan add-new-user 2
        for($i = 0; $i < $argument; $i++){
            $name = $this->ask('Please enter your name: ');
            $email = $this->ask('Please enter your email: ');
            $password = $this->secret('Please enter your password: ');
            $is_admin = $this->ask('Please enter your is_admin: ');
            $gender = $this->choice('Please choose your gender: ', ['male','female','other'], 'male'); // Nếu người dùng không chọn gì thì giá trị mặc định là male
            // Hỏi người dùng có muốn tiếp tục quá trình thêm user hay không ?
            // if($this->confirm('Do you want to continue the process of adding new users ?', true)){} // Giá trị mặc định đang là yes (option thứ 2 là giá trị mặc định)
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'is_admin' => $is_admin
            ]);
        }
        return Command::SUCCESS;
    }

    // Để kiểm tra câu lệnh do chúng ta tự tạo gõ: php artisan help add-new-user (adđ-new-user là tên command)
}
