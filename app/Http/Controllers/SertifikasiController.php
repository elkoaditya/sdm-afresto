<?php

namespace App\Http\Controllers;

use App\Models\Sertifikasi;
use App\Models\UserDoc;
use App\Models\UserSertifikasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class SertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sertifikasis = Sertifikasi::all();
        return view('admin.sertifikasi', compact('sertifikasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'type' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Username & Password harap di Isi');
        }
        try {
            $sertifikasi = Sertifikasi::create($validator->validated());
            if ($sertifikasi){
                return redirect()->back()->with('massage', 'berhasil di tambahan');
            }
        } catch (\Exception $err){
            dd($err);
            return redirect()->back()->with('massage', 'Ada yg salah nih');
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
        $validator = Validator::make($request->all(), [
            'nomor' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'id_kategori' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
            return redirect()->back()->with('message', 'Username & Password harap di Isi');
        }
        try {







            $start = Carbon::createFromFormat('m/d/y', $request->start_date)->toDateString();
            $end = Carbon::createFromFormat('m/d/y', $request->end_date)->toDateString();

            $_user = UserSertifikasi::where([
                'id_user' => Auth::id(),
                'id_sertifikasi' => $request->id_kategori,
            ])->first();
            if ($_user){
                $user = UserSertifikasi::where([
                    'id_user' => Auth::id(),
                    'id_sertifikasi' => $request->id_kategori,
                ])->update([
                    'start_date' => $start,
                    'end_date' => $end,
                    'nomor' => $request->nomor,
                ]);
            }else{
                $user = UserSertifikasi::create([
                    'start_date' => $start,
                    'end_date' => $end,
                    'nomor' => $request->nomor,
                    'id_sertifikasi' => $request->id_kategori,
                    'id_user' => Auth::id(),
                ]);
                $_user = UserSertifikasi::where([
                    'id_user' => Auth::id(),
                    'id_sertifikasi' => $request->id_kategori,
                ])->first();
            }
            if ($request->file){
                $validator = Validator::make($request->all(), [
                    'file' => 'required|mimes:doc,docx,pdf',
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors());
                    return redirect()->back()->with('message', 'Username & Password harap di Isi');
                }
                $file = $request->file;
                $name = $file->getClientOriginalName();
                $tujuan = 'userfile';
                $file->move($tujuan, $file->getClientOriginalName());
                $_file = UserDoc::create([
                    'id_user_sertifikasi' => $_user->id,
                    'name' => $name,
                    'file' => '/'.$tujuan."/".$file->getClientOriginalName()
                ]);
            }
            if ($user){
                return redirect()->back();
            }

        } catch (\Exception $err){
            dd($err);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Sertifikasi::where('id', $id)->first();
        $userSertifikat = UserSertifikasi::where('id_sertifikasi', $id)->where('id_user', Auth::id())->first();
        return view('sdm.detailsertifikasi', compact('kategori', 'userSertifikat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sertifikasi $sertifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sertifikasi $sertifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sertifikasi  $sertifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sertifikasi $sertifikasi)
    {
        //
    }
}
