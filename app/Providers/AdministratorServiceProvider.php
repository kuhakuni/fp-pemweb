<?php

namespace App\Providers;

use App\Models\Administrator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AdministratorServiceProvider extends ServiceProvider
{
    private $dataAdmin;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->dataAdmin = Administrator::all();
        View::composer("components.header", function ($view) {
            $view->with("dataAdmin", $this->dataAdmin);
        });
    }
}