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
        Form::component('bsText', 'components.form.text', ['textBoxName', 'labelText'=>'Label text', 'textBoxValue' => null, 'textBoxHtmlAttributesArray' => []]);
        Form::component('bsFile', 'components.form.file', ['fileInputName', 'labelText'=>'Label text', 'fileInputHtmlAttributesArray' => []]);
        Form::component('bsSelect', 'components.form.select', ['selectBoxName', 'labelText'=>'Label text', 'keyValueArray'=>[], 'selectedValue'=>null, 'selectBoxHtmlAttributesArray' => []]);
        Form::component('bsButton', 'components.form.button', ['buttonName', 'buttonText'=>'BUTTON', 'iconClass'=>'', 'toolTip'=>'click to submit']);
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
