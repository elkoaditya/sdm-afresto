<?php

namespace App\Helper;

use Illuminate\Support\Facades\Http;

class Whatsapp {
    static public function send($data, $pesan, $header, $name){
        foreach ($data as $d){
            try {

                $response = Http::post('https://elko:kitabisa1@communication-gateway.afresto.id/api/client/sendsimplemessage', [
                    'nowa' => (string)$d,
                    'header' => $header,
                    'message' => $pesan,
                    'name' => $name,
                ]);

                return $response->json();
            } catch (\Exception $err){
                dd($err);
                return $err;
            }
        }
    }
}

