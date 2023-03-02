<?php

namespace App\Helper;

use http\Url;

class Route {
    static public function me(){
        return \Illuminate\Support\Facades\URL::to('/');
//        if ($_SERVER['HTTP_HOST'] == 'bukutamu.test'){
//            return \Illuminate\Support\Facades\URL::to('/');
//        }else{
//            return 'https://'.$_SERVER['HTTP_HOST'].'/'.APP_SUBDOMAIN;
//        }
    }
    static public function img(){
        if ($_SERVER['HTTP_HOST'] == 'bukutamu.test'){
            return '';
        }else{
            return 'https://'.$_SERVER['HTTP_HOST'].'/loveyou/public';
        }
    }
    static public function databasehost_select(){

        if (isset($_SERVER['HTTP_HOST'])) {
            if ($_SERVER['HTTP_HOST'] == 'bukutamu.test'){
                return env('DB_HOST', 'forge');
            }else{
                if (APP_DB_HOST == "APP_DB_HOST"){
                    return env('DB_HOST', 'forge');
                }else{
                    return APP_DB_HOST;
                }
            }
        } else {
            return env('DB_HOST', 'forge');
        }
    }
    static public function database_select(){
        if (isset($_SERVER['HTTP_HOST'])) {
            if ($_SERVER['HTTP_HOST'] == 'bukutamu.test'){
                return env('DB_DATABASE', 'forge');
            }else{
                if (APP_DB == "APP_DB"){
                    return env('DB_DATABASE', 'forge');
                }else{
                    return APP_DB;
                }
            }
        } else {
            return env('DB_DATABASE', 'forge');
        }
    }
}

