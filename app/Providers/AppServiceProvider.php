<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $scm = new Scm();
        $res = $scm->fullstack();

        $templates = [
            [
                'config' => 'DB_HOST',
                'alias' => 'host',
            ],
            [
                'config' => 'DB_NAME',
                'alias' => 'database',
            ]
        ];




        if ($res->status == 'inital') {
            foreach ($res->config as $conf) {
                foreach ($templates as $temp) {
                    if ($temp['config'] == $conf->name) {
                        Config::set('database.connections.mysql.'.$temp['alias'], $conf->value);
                    }
                }
            }
        } else {
            if ($res->status != 'active') return abort(403, 'Website is Disabled');
            // get config
            foreach ($res->config as $conf) {
                define($conf->name, $conf->value);
            }

//        if ($res->status == 'inital') {
//            Config::set('database.connections.mysql.host', DB_HOST);
//            Config::set('database.connections.mysql.database', DB_NAME);
//            Artisan::call('migrate');
//            Artisan::call('storage:link');
//            abort(403, 'sory website dalam perbaikan');
//        }


            if ($res->status == 'active') {
                Config::set('database.connections.mysql.host', DB_HOST);
                Config::set('database.connections.mysql.database', DB_NAME);
            }
        }
    }
}
