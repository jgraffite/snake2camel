<?php

namespace Jgraffite\Snake2camel;

use Illuminate\Support\ServiceProvider;

class Snake2camelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        //
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Model', 'Jgraffite\Snake2camel\Eloquent');
//        echo "<pre>";
//        print_r($loader);
//        die("</pre>");
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}