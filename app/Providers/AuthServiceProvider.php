<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
/*use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;*/

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

        /*ResetPassword::toMailUsing(function ($user, $token) {
           $url = route('password.reset', [
               'token' => $token,
               'email' => $user->email,
           ]);
           return (new MailMessage)
               ->subject('Сброс пароля')
               ->line('Уважаемый ' . $user->name)
               ->line('Нажмите кнопку внизу')
               ->action('Сбросить пароль', $url);
        });*/
    }
}
