<?php

namespace App\Http\Controllers;

use App\Models\Sertifikasi;
use App\Models\UserSertifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SdmController extends Controller
{
    public function home(){
        $all_wajib = Sertifikasi::where('type', 'wajib')->get();
        $all_tidakwajib = Sertifikasi::where('type', 'tidakwajib')->get();

        $jawab_wajib = Sertifikasi::where('type', 'wajib')->whereHas('user', function ($q){
            $q->where('id_user', Auth::user()->id);
        })->get();
        $jawab_tidakwajib = Sertifikasi::where('type', 'tidakwajib')->whereHas('user', function ($q){
            $q->where('id_user', Auth::user()->id);
        })->get();
        return view('sdm.home', compact('all_tidakwajib', 'all_wajib', 'jawab_wajib', 'jawab_tidakwajib'));
    }
    public function listSertifikat(){
        $sertifikats = Sertifikasi::get();
        return view('sdm.sertifikasi', compact('sertifikats'));
    }
}
