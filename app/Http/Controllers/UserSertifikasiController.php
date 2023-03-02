<?php

namespace App\Http\Controllers;

use App\Models\Sertifikasi;
use App\Models\UserSertifikasi;
use Illuminate\Http\Request;
use Validator;

class UserSertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sertifikasis = Sertifikasi::all();
        return view('sdm.sertifikasi', compact('sertifikasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_sertifikasi' => 'required|string',
            'nomor' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Username & Password harap di Isi');
        }
        try {

        } catch (\Exception $err){
            dd($err);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSertifikasi  $userSertifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(UserSertifikasi $userSertifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSertifikasi  $userSertifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSertifikasi $userSertifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserSertifikasi  $userSertifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSertifikasi $userSertifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSertifikasi  $userSertifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSertifikasi $userSertifikasi)
    {
        //
    }
}
