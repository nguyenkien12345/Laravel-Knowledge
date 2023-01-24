<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PodcastProcessed;
use App\Listeners\SendPostcastProcessed;
use App\Events\DemoEvent;
use App\Listeners\DemoListener;
use function Illuminate\Events\queueable;
use Log;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        // Lưu ý: Event sẽ bao bọc Listener
        // Khai báo các cặp Event, Listener vào trong đây
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PodcastProcessed::class => [
            SendPostcastProcessed::class,
        ],
        DemoEvent::class => [
            DemoListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Cách 1
        // Lắng nghe cái event PodcastProcessed được gọi và thực thi cái hàm handle trong listener SendPostcastProcessed
        // Event::listen(PodcastProcessed::class, [SendPostcastProcessed::class, 'handle']);

        // Cách 2
        Event::listen(PodcastProcessed::class, SendPostcastProcessed::class);

        // Cách 3 Chạy trực tiếp thông qua function
        // Do ta đang dùng QUEUE_CONNECTION=database (trong file .env) nên phải check trong database đã có bảng jobs hay chưa ? Nếu chưa có thì chạy câu lệnh
        // php artisan queue:table. Sau đó php artisan migrate lại. Cuối cùng là chạy php artisan queue:listen để lắng nghe event PodcastProcessed trong queue
        // Event::listen(queueable(
        //     function (PodcastProcessed $event){
        //         Log::info('NGUYỄN TRUNG KIÊN VÀ MAI THỊ THANH THÚY');
        //     })->onConnection("redis")->onQueue('postcast')->delay(now()->addSeconds(10))
        // );
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}

// php artisan event:list => Xem tất cả các event, listener mà chúng ta đã đăng ký

//  php artisan event:generate => Nó sẽ tạo ra cho chúng ta 2 file PodcastProcessed (Event) và  SendPostcastProcessed (Listener) và để nó nằm đúng trong folder
// Event và folder Listener thì chúng ta phải khai báo cho nó 2 cái namsespace tương ứng lần lượt là:
// use App\Events\PodcastProcessed;
// use App\Listeners\SendPostcastProcessed;

// PodcastProcessed::class => [
//     SendPostcastProcessed::class,
// ],
