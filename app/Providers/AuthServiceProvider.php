<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Comment_Authorization;
use App\Policies\CommentPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Comment_Authorization::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    // Authorization (Phần quyền | Cấp quyền)
    // Đăng ký các Gate trong boot
    public function boot()
    {
        $this->registerPolicies();

        // // before và after luôn luôn chạy trước Gate::allows và Gate::denies
        // Gate::before(function($user, $ability){
        //     if($user->isSuperAdmin()){
        //         return true;
        //     }
        //     else{
        //         return null;
        //     }
        // });

        // Gate::after(function($user, $ability, $result, $arguments){
        // });


        // Người nào viết ra cái bình luận thì mới được phép sửa (Vd: user 1 viết ra comment 1 thì chỉ user 1 mới được phép sửa comment 1)
        // Gate::define('edit-comment', function($user, $comment){
        //     return $user->user_id === $comment->user_id;
        // });

        Gate::resource('comments', 'CommentPolicy');
    }
}
