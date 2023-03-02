<?php

try {
    if (request()->getHost() == 'localhost') {
        return;
    }


    if (!request()->getHost() == \Illuminate\Support\Env::get('LOCAL_DOMAIN')) {
        $host = 'https://scm-v2.elco.systems/api/';
        $api = \Illuminate\Support\Facades\Http::withHeaders([
            'api-key' => 'UunMZCvvreujKp4pIvPErxRFQRFbOXdUG7NZhJXZM6EciKMpV4gQ9VmUGXSp1XCMK8emIaMxb8Dq5qEOkvXCRXaDCF1zz4FdgwHohZHqkokQuIMArPE3OKz9kvWH1syx'
        ]);
        $res = $api->post($host.'scm', [
            'domain' => request()->getHost()
        ]);
        $result = json_decode($res->body());
        $result = $result->data;
        if ($result->status == 'disable') {
            return abort(403, 'Website disable');die();
        }
        // Define connections
        config(['database.connections.mysql' => [
            'host' => $result->koneksi->host,
            'username' => $result->koneksi->username,
            'password' => $result->koneksi->password,
            'port' => $result->koneksi->port,
            'database' => $result->koneksi->database,
            'driver' => 'mysql',
        ]]);
        // Define config
        foreach ($result->config as $config) {
            define($config->key, $config->value);
        }
    }
} catch (\Exception $err) {
    abort(403, 'Ada error nih');
}


