<?php

namespace App\Http\Controllers;

use App\Models\Sertifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UsersController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Username & Password harap di Isi');
        }
        try {
            $key = 'fresto6';
//            dd(md5($request->password.$key).md5($key));
            $user = User::where([
                'username' => $request->username,
                'password' => md5($request->password.$key).md5($request->password),
            ])->first();
            if ($user != null){
                Auth::loginUsingId($user->id);
                if (\auth()->user()->role == 'admin'){
                    return redirect('/admin/home');
                }else if (\auth()->user()->role == 'sdm'){
                    return redirect('/sdm/home');
                }else{
                    return redirect()->back()->with('message', 'Oh is Snap LOL ...');
                }
            }
            return redirect()->back()->with('message', 'username & password anda salah');
        } catch (\Exception $err){
            dd($err);
        }
    }
    public function index(){
        $users = User::where('role', 'sdm')->get();
        return view('admin.users', compact('users'));
    }
    public function detail($id){
        $sertifikasis = Sertifikasi::all();
        return view('admin.detailuser', compact('sertifikasis', 'id'));
    }
}
