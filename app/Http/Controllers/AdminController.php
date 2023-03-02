<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDoc;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        $totalUser = User::get()->count();
        $rec = UserDoc::get();
        return view('admin.home', compact('totalUser', 'rec'));
    }
}
