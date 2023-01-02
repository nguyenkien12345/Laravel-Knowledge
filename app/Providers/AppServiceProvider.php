<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menu\MenuManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Khai báo các file helpers trong folder Helpers mà ta tự tạo ra

        // Import 1 file helper
        // $file = \app_path('Helpers\helpers.php');
        // if(\file_exists($file)){
        //     require_once($file);
        // }

        // Import nhiều file helper
        // foreach(glob(\app_path().'/Helpers/*.php') as $file){
        //     require_once($file);
        // }

        // Khai báo Facade
        $this->app->singleton('menu', function(){
            return new MenuManager();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
