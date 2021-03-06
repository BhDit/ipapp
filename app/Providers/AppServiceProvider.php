<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (!class_exists('IPAPP')) {
            class_alias('App\IPAPP', 'IPAPP');
        }

        $services = [
            'Contracts\AnnouncementRepository' => 'Repositories\AnnouncementRepository',
            'Contracts\NotificationRepository' => 'Repositories\NotificationRepository',
        ];

        foreach ($services as $key => $value) {
            $this->app->singleton('App\Ipapp\\' . $key, 'App\Ipapp\\' . $value);
        }
    }
}
