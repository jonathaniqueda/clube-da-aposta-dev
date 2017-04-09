<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function home()
    {
        return view('dashboard.index');
    }

    public function logoutUser()
    {
        \Auth::logout();
        \Session::flush();
        return redirect()->to('/');
    }
}
