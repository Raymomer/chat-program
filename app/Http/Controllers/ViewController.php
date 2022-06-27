<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function dashboard()
    {
        return view('main');
    }

    public function Login()
    {
        return view('main', ['content' => 'login']);
    }
}
