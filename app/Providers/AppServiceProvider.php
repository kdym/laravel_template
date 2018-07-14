<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        Form::component('restModel', 'components.form.form', ['model', 'id', 'routeName' => null, 'modelName' => null, 'attributes' => []]);

        Form::component('bsText', 'components.form.text', ['name', 'label', 'attributes' => [], 'default' => null]);
        Form::component('bsPhone', 'components.form.phone', ['name', 'label', 'attributes' => [], 'default' => null]);
        Form::component('bsEmail', 'components.form.email', ['name', 'label', 'attributes' => []]);
        Form::component('bsPassword', 'components.form.password', ['name', 'label', 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select', ['name', 'label', 'values', 'default' => null, 'attributes' => []]);

        Form::component('bsSubmit', 'components.form.submit', ['text']);
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
