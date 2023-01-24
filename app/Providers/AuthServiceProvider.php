<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        // VerifyEmail::toMailUsing(function($notifiable, $url){
        //     return (new MailMessage) 
        //         -> subject('Verify Account') 
        //         -> line('Your account is almost ready, just click the below button to continue')
        //         -> action('Confirm Account', $url)
        //         -> line('If you didnt created o request this, just ignore the message');
        // });
    }
}
