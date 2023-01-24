<?php

use Illuminate\Support\Facades\Route;
use App\Events\PodcastProcessed;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\HttpClientController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\OtpFireBaseController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\SomeInteractImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocalizationControlller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DetectionController;
use App\Http\Controllers\ChartController;

use Stichoza\GoogleTranslate\GoogleTranslate;
use ShortURL\ShortURL\Shorten;

Route::get('/', function () {
    // Gọi sự kiện event
    // Cách 1
    // event(new \App\Events\PodcastProcessed());

    // Cách 2
//    \App\Events\DemoEvent::dispatch('Nguyễn Trung Kiên', '22');
//    \App\Events\DemoEvent::dispatch('Mai Thị Thanh Thúy', '23');
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::prefix('category')->group(function(){
        Route::get('',[CategoryController::class, 'index'])->name('admin.category.index');

        Route::get('create',[CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('store',[CategoryController::class, 'store'])->name('admin.category.store');

        Route::get('edit/{category_id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('update/{category_id}',[CategoryController::class, 'update'])->name('admin.category.update');

        Route::get('delete/{category_id}',[CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::prefix('post')->group(function(){
        Route::get('',[PostController::class, 'index'])->name('admin.post.index');

        Route::get('create',[PostController::class, 'create'])->name('admin.post.create');
        Route::post('store',[PostController::class, 'store'])->name('admin.post.store');

        Route::get('edit/{post_id}',[PostController::class, 'edit'])->name('admin.post.edit');
        Route::put('update/{post_id}',[PostController::class, 'update'])->name('admin.post.update');

        Route::get('delete/{post_id}',[PostController::class, 'delete'])->name('admin.post.delete');
    });

    Route::prefix('user')->group(function(){
        Route::get('',[UserController::class, 'index'])->name('admin.user.index');

        Route::get('create',[UserController::class, 'create'])->name('admin.user.create');
        Route::post('store',[UserController::class, 'store'])->name('admin.user.store');

        Route::get('edit/{user_id}',[UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('update/{user_id}',[UserController::class, 'update'])->name('admin.user.update');

        Route::get('delete/{user_id}',[UserController::class, 'delete'])->name('admin.user.delete');
    });

    Route::prefix('contact')->group(function(){
        Route::get('',[ContactController::class, 'index'])->name('admin.contact.index');
        Route::get('delete/{contact_id}',[ContactController::class, 'delete'])->name('admin.contact.delete');
    });
});

// DEMO AUTHENTICATION
Route::get('login', [AuthController::class, 'showFormLogin'])->name('show-form-login');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('register', [AuthController::class, 'showFormRegister'])->name('show-form-register');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::middleware(['check-login'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [AuthController::class, 'showProfile'])->name('show-profile');
    Route::put('profile', [AuthController::class, 'updateProfile'])->name('update-profile');
});

Route::prefix('authentication')->middleware(['check-admin'])->group(function(){
    Route::get('boy', [AuthController::class, 'getBoyView'])->name('get-boy-view');
    Route::get('girl', [AuthController::class, 'getGirlView'])->name('get-girl-view');
});

Route::get('check-user-is-online', [AuthController::class, 'getAllUser'])->name('check-user-is-online');

Route::get('users-soft-force-restore', [AuthController::class, 'getAllUserSoftDeleteRestore'])->name('users-soft-force-restore');

Route::get('softDelete/{user_id}', [AuthController::class, 'softDelete'])->name('softDelete');
Route::get('forceDelete/{user_id}', [AuthController::class, 'forceDelete'])->name('forceDelete');

Route::get('trashed', [AuthController::class, 'trashed'])->name('trashed');

Route::get('restore/{user_id}', [AuthController::class, 'restore'])->name('restore');
Route::get('restore-all', [AuthController::class, 'restoreAll'])->name('restore-all');

// Localization (Đa ngôn ngữ)
// Nơi setup ngôn ngữ chính là folder lang
// Setup lại ngôn ngữ cho trang web
Route::get('change-language/{locale}', [LangController::class, 'changeLanguage']);
// Test hiển thị ngôn ngữ của trang web
Route::middleware('localization')->get('test-language', [LangController::class, 'testLanguage']);


route::get('test-event-listener', function(){
    event(new PodcastProcessed());
});

route::get('test-helper', function(){
    // Vì ta đã khai báo Helpers theo dạng alias trong app.php nên không cần phải sử dụng use namespace file Helpers
    return \Helpers::ntkmttt();
});

// DEMO Request Http-Client
route::get('posts', [HttpClientController::class, 'getAllPosts']);

// DEMO Send Mail
route::get('send-mail', [SendMailController::class, 'sendMail']);
route::get('get-config-mail', [SendMailController::class, 'getConfigEmail']);
route::post('post-config-mail', [SendMailController::class, 'postConfigEmail']);

// START AUTHENTICATION (Sau khi cài laravel/ui và chạy lệnh php artisan ui:auth) //
// Đọc các chú thích, giải thích của từng controller trong folder app\Http\Controllers\Auth
Auth::routes(['verify' => true]);
Route::middleware(['password.confirm', 'verified'])->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('log-info', [App\Http\Controllers\HomeController::class, 'logInfo'])->name('log-info');
Route::get('check-login', function(){
    // Auth::check() => Kiểm tra xem người dùng đã đăng nhập hay chưa
    if(Auth::check()){
        echo 'Bạn đã đăng nhập';
    }
    else{
        echo 'Bạn chưa đăng nhập';
    }
});
// END AUTHENTICATION (Sau khi cài laravel/ui và chạy lệnh php artisan ui:auth) //

// START Upload File //
Route::get('upload-file', [UploadFileController::class, 'uploadFile'])->name('upload-file');
Route::post('handle-file', [UploadFileController::class, 'handleFile'])->name('handle-file');
Route::post('download-document', [UploadFileController::class, 'downloadDocument'])->name('download-document');
// END Upload File //

// START Firebase Cloud Messaging (FCM) //
Route::get('/firebase-notification', [PushNotificationController::class, 'index']);
Route::post('/store-token', [PushNotificationController::class, 'updateDeviceToken'])->name('store.token');
Route::post('/send-web-notification', [PushNotificationController::class, 'sendNotification'])->name('send.web-notification');
// END Firebase Cloud Messaging (FCM) //

// START Login With OTP //
Route::post('send-otp', [OtpController::class, 'sendOtp']);
Route::get('login-with-otp', [OtpController::class, 'index'])->name('get-login-with-otp');
Route::post('login-with-otp', [OtpController::class, 'loginWithOtp'])->name('post-login-with-otp');
// END Login With OTP //

// START QR CODE //
Route::get('generate-qrcode', [QrCodeController::class, 'index']);
// END QR CODE //

// START Authorization (Phân quyền | Cấp phép ) //
Route::get('home/{comment_id}', [HomeController::class, 'editComment']);
// START Authorization (Phân quyền | Cấp phép ) //

// START SettingController //
Route::get('test-settings', [SettingController::class, 'index']);
// START SettingController //

route::get('workers', [HttpClientController::class, 'getAllWorkers']);
route::get('customers', [HttpClientController::class, 'getAllCustomers']);
route::get('sign-up-worker', [HttpClientController::class, 'registerWorker']);
route::get('sign-up-customer', [HttpClientController::class, 'registerCustomer']);

// START OtpFirebaseController //
route::get('otp-firebase', [OtpFireBaseController::class, 'otpFirebase'])->name('otp-firebase');
// END OtpFirebaseController //

// START CaptchaController //
route::get('captcha-demo', [CaptchaController::class, 'index'])->name('captcha-demo');
route::get('reload-captcha', [CaptchaController::class, 'reloadCaptcha'])->name('reload-captcha');
route::post('send-data-captcha', [CaptchaController::class, 'sendDataCaptcha'])->name('send-data-captcha');
// END CaptchaController //

// START SomeInteractImageController //
route::get('some-interact-image', [SomeInteractImageController::class, 'index'])->name('some-interact-image');
route::post('compress-image', [SomeInteractImageController::class, 'compressImage'])->name('compress-image');
// END SomeInteractImageController //

// START TEST GOOGLE TRANSLATE //
route::get('test-google-translate', function(){
    $google_translate = new GoogleTranslate();
    // Dịch từ ngôn ngữ nào sang ngôn ngữ nào
    $data = $google_translate
    ->setSource('vi')
    ->setTarget('sv')
    ->translate('Mình là Mai Thị Thanh Thúy. Mình là nữ đến từ thành phố Bà Rịa Vũng Tàu. Mình 23 tuổi. Hiện tại mình đang độc thân');
    dd($data);
})->name('test-google-translate');
// END TEST GOOGLE TRANSLATE //

// START TEST ShortURL //
route::get('test-shortURL', function(){
    // Rút gọn URL
    // Cách 1
    // $data = Shorten::create('https://www.facebook.com/maithithanhthuy.hr');

    // Cách 2
    // $shorten = new Shorten();
    // $data = $shorten->text('https://www.facebook.com/maithithanhthuy.hr');

    // dd($data);
})->name('test-shortURL');
// END TEST ShortURL //

// START Demo Restrict IP //
route::get('demo-restrict-ip', function(){
    return '<h1>Mai Thị Thanh Thúy (NOT API)</h1>';
});

route::get('api/demo-restrict-ip', function(){
    return '<h1>Mai Thị Thanh Thúy (API)</h1>';
});

// START Demo Location //
route::get('show-data-location', [LocationController::class, 'index']);
// END Demo Location //

// START Demo Localization //
route::get('locale', [LocalizationControlller::class, 'index']);
route::get('locale/{language}', [LocalizationControlller::class, 'setLang']);
// END Demo Localization //

// START Demo Multi Step //
route::get('multistep', [EmployeeController::class, 'index'])->name('multistep');
route::post('post-multistep', [EmployeeController::class, 'postMultiStep'])->name('post-multistep');
// END Demo Multi Step //

// START Demo Operating system browser and device detection in laravel //
route::get('detection', [DetectionController::class, 'index'])->name('detection');
// END Demo Operating system browser and device detection in laravel //

// START Demo Chart //
route::get('chart', [ChartController::class, 'index'])->name('chart');
// END Demo Chart //
