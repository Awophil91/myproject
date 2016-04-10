<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

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
        //register custom components (templates) for forms
        Form::component('bsText', 'components.form.text', ['textBoxName', 'labelText'=>'Label text', 'textBoxValue' => null, 'textBoxAttributes' => []]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
