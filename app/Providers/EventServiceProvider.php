<?php

namespace App\Providers;

use App\Events\{
    PostCreated
};
use App\Listeners\{
    NotifyUsersNewPostCreated
};
use App\Models\{
    Post
};
use App\Observers\{
    PostObserver
};
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /* 
            Sempre que cadastrar um novo usuário ele usará o listener SendEmailVerificationNotification
            para disparar um email para o usuário confirmar o email cadastrado            
        */
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        /* Sempre que usar o Event PostCreated ele usará automaticamente o nosso listener  NotifyUsersNewPostCreated*/
        PostCreated::class => [
            NotifyUsersNewPostCreated::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
    }
}
