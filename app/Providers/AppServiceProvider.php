<?php

namespace App\Providers;

use App\Actions\duplicate;
use TCG\Voyager\Facades\Voyager;
use App\FormFields\Multidatepicker;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::addFormField(Multidatepicker::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Voyager::addAction(duplicate::class);
    }
}
